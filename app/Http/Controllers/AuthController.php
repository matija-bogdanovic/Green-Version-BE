<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserDataRequest;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verify']]);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $imageContent = file_get_contents('https://eu.ui-avatars.com/api/?background=FFFCF9&color=1C1C1C&size=200&name=' . $validated['name']);

        $fileName = 'images/' . uniqid() . '.png';
        Storage::disk('public')->put($fileName, $imageContent);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'profile_photo' => $fileName
        ]);

        $userSettings = new UserSettings();
        $userSettings->user_id = $user->id;
        // Set any default settings or additional properties here
        $userSettings->save();

        $user->sendEmailVerificationNotification();

        if ($token = auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return $this->respondWithToken($token);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function verify(Request $request, string $id, string $hash)
    {
        $userId = $id;
        $user = User::findOrFail($userId);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['error' => 'Invalid verification link'], 401);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['error' => 'Email already verified'], 401);
        }

        $user->markEmailAsVerified();

        return redirect(config('app.url') . '/login');
        // return response()->json(['message' => config('app.url') . '/login']); // TODO: Redirektuj
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'unauthorized'], 401);
        }

        $user = auth()->user();

        // Proveravamo da li je e-mail korisnika verifikovan
        if (!$user->hasVerifiedEmail()) {
            // Ako e-mail nije verifikovan, vraćamo grešku
            return response()->json(['error' => 'email_not_verified'], 401);
        }

        // Ako je sve u redu, vraćamo token
        return $this->respondWithToken($token);
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'successfully_logged_out']);
    }

    public function updateSettings()
    {
        $settings = UserSettings::where('user_id', auth()->user()->id)->first();

        return response()->json(['message' => 'successfully_updated_settings']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => auth()->user(),
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
