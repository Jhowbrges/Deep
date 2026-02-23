<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
	/**
	 * Display the user's profile form.
	 */
	public function edit(Request $request): View
	{
		return view('profile.edit', [
			'user' => $request->user(),
		]);
	}

	/**
	 * Update the user's profile information.
	 */
	public function update(ProfileUpdateRequest $request): RedirectResponse
	{
		$user = $request->user();

		$data = $request->validated();

		// Não deixar password/profile_photo entrarem no fill()
		unset($data['password'], $data['password_confirmation'], $data['profile_photo']);

		$user->fill($data);

		// Senha opcional: só atualiza se vier preenchida (e sempre com hash)
		if ($request->filled('password')) {
			$user->password = Hash::make($request->password);
		}

		// Se alterou email, remove verificação
		if ($user->isDirty('email')) {
			$user->email_verified_at = null;
		}

		// Upload de foto (opcional)
		if ($request->hasFile('profile_photo')) {

			// Remove foto antiga (se existir)
			if ($user->profile_photo) {
				Storage::disk('public')->delete($user->profile_photo);
			}

			$path = $request->file('profile_photo')->store('profiles', 'public');
			$user->profile_photo = $path;
		}

		$user->save();

		return Redirect::route('profile.edit')->with('status', 'profile-updated');
	}

	/**
	 * Delete the user's account.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		$request->validateWithBag('userDeletion', [
			'password' => ['required', 'current_password'],
		]);

		$user = $request->user();

		Auth::logout();

		$user->delete();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return Redirect::to('/');
	}
}

