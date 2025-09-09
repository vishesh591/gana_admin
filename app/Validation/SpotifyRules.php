<?php

namespace App\Validation;

class SpotifyRules
{
    /**
     * Validate that a Spotify artist ID is provided
     */
    public function required_spotify_artist(string $str, string &$error = null): bool
    {
        if (empty($str)) {
            $error = 'Please select an artist from the dropdown';
            return false;
        }

        // Check if it's a valid Spotify ID format (22 characters, alphanumeric)
        if (!preg_match('/^[a-zA-Z0-9]{22}$/', $str)) {
            $error = 'Invalid Spotify artist ID format';
            return false;
        }

        return true;
    }

    /**
     * Validate that an Apple Music artist ID is provided
     */
    public function required_apple_artist(string $str, string &$error = null): bool
    {
        if (empty($str)) {
            $error = 'Please select an Apple Music artist from the dropdown';
            return false;
        }

        // Check if it's a valid Apple Music ID format (numeric)
        if (!preg_match('/^[0-9]+$/', $str)) {
            $error = 'Invalid Apple Music artist ID format';
            return false;
        }

        return true;
    }

    /**
     * Allow empty Apple Music ID (optional validation)
     */
    public function permit_empty_apple_artist(string $str, string &$error = null): bool
    {
        if (empty($str)) {
            return true; // Allow empty
        }

        // If not empty, validate format
        return $this->required_apple_artist($str, $error);
    }

    public function permit_empty_spotify_artist(string $str, string &$error = null): bool
    {
        if (empty($str)) {
            return true; // Allow empty
        }

        // If not empty, validate format
        return $this->required_spotify_artist($str, $error);
    }

}