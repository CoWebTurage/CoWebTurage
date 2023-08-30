<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create fictional users
        $users = [
            [
                'email' => 'john@example.com',
                'password' => Hash::make('password1'),
                'firstname' => 'John',
                'lastname' => 'Doe',
                'phone' => '123-456-7890',
            ],
            [
                'email' => 'alice@example.com',
                'password' => Hash::make('password2'),
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'phone' => '987-654-3210',
            ],
            [
                'email' => 'mike@example.com',
                'password' => Hash::make('password3'),
                'firstname' => 'Mike',
                'lastname' => 'Johnson',
                'phone' => '555-123-4567',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // Create fictional password reset tokens
        $tokens = [
            [
                'email' => 'john@example.com',
                'token' => 'fake_token_1',
                'created_at' => now(),
            ],
            [
                'email' => 'alice@example.com',
                'token' => 'fake_token_2',
                'created_at' => now(),
            ],
            [
                'email' => 'mike@example.com',
                'token' => 'fake_token_3',
                'created_at' => now(),
            ],
        ];

        foreach ($tokens as $tokenData) {
            DB::table('password_reset_tokens')->insert($tokenData);
        }

        // Create fictional failed jobs
        $failedJobs = [
            [
                'uuid' => 'fake_uuid_1',
                'connection' => 'database',
                'queue' => 'default',
                'payload' => json_encode(['data' => 'payload_data_1']),
                'exception' => 'FictionalException1',
            ],
            [
                'uuid' => 'fake_uuid_2',
                'connection' => 'redis',
                'queue' => 'high',
                'payload' => json_encode(['data' => 'payload_data_2']),
                'exception' => 'FictionalException2',
            ],
            [
                'uuid' => 'fake_uuid_3',
                'connection' => 'sqs',
                'queue' => 'low',
                'payload' => json_encode(['data' => 'payload_data_3']),
                'exception' => 'FictionalException3',
            ],
        ];

        foreach ($failedJobs as $jobData) {
            DB::table('failed_jobs')->insert($jobData);
        }

        // Create fictional personal access token data
        $tokens = [
            [
                'tokenable_id' => 1,
                'tokenable_type' => 'users',
                'name' => 'John Token',
                'token' => 'fake_token_1',
                'abilities' => '["read"]',
            ],
            [
                'tokenable_id' => 2,
                'tokenable_type' => 'users',
                'name' => 'Alice Token',
                'token' => 'fake_token_2',
                'abilities' => '["write"]',
            ],
            [
                'tokenable_id' => 3,
                'tokenable_type' => 'users',
                'name' => 'Mike Token',
                'token' => 'fake_token_3',
                'abilities' => '["read", "write"]',
            ],
        ];

        foreach ($tokens as $tokenData) {
            DB::table('personal_access_tokens')->insert($tokenData);
        }

        // Create fictional car data
        $cars = [
            [
                'plate' => 'ABC123',
                'seats' => 4,
                'model' => 'Sedan',
                'color' => 'Blue',
                'user_id' => 1,
            ],
            [
                'plate' => 'XYZ789',
                'seats' => 7,
                'model' => 'SUV',
                'color' => 'Red',
                'user_id' => 2,
            ],
            [
                'plate' => 'DEF456',
                'seats' => 5,
                'model' => 'Hatchback',
                'color' => 'Green',
                'user_id' => 3,
            ],
        ];

        foreach ($cars as $carData) {
            DB::table('cars')->insert($carData);
        }

        // Create fictional trip data
        $trips = [
            [
                'start_location' => 'City A',
                'end_location' => 'City B',
                'start_time' => now(),
                'end_time' => now()->addHours(2),
                'price' => 30.0,
                'user_id' => 1,
                'car_id' => 1,
            ],
            [
                'start_location' => 'City C',
                'end_location' => 'City D',
                'start_time' => now()->subHours(1),
                'end_time' => now()->addHours(1),
                'price' => 25.0,
                'user_id' => 2,
                'car_id' => 2,
            ],
            [
                'start_location' => 'City E',
                'end_location' => 'City F',
                'start_time' => now()->addHours(3),
                'end_time' => now()->addHours(4),
                'price' => 40.0,
                'user_id' => 3,
                'car_id' => 3,
            ],
            // Add more fictional trips here...
        ];

        foreach ($trips as $tripData) {
            DB::table('trips')->insert($tripData);
        }

        // Create fictional passenger data
        $passengers = [
            [
                'status' => 'accepted',
                'place' => 'Front seat',
                'user_id' => 2,
                'trip_id' => 1,
            ],
            [
                'status' => 'pending',
                'place' => 'Back seat',
                'user_id' => 3,
                'trip_id' => 1,
            ],
            [
                'status' => 'accepted',
                'place' => 'Front seat',
                'user_id' => 1,
                'trip_id' => 2,
            ],
            // Add more fictional passenger data here...
        ];

        foreach ($passengers as $passengerData) {
            DB::table('passengers')->insert($passengerData);
        }

        // Create fictional review data
        $reviews = [
            [
                'comment' => 'Great ride, very friendly!',
                'stars' => 4.5,
                'reviewer_id' => 1,
                'reviewed_id' => 2,
            ],
            [
                'comment' => 'Excellent trip, would ride again!',
                'stars' => 5.0,
                'reviewer_id' => 3,
                'reviewed_id' => 1,
            ],
            // Add more fictional review data here...
        ];

        foreach ($reviews as $reviewData) {
            DB::table('reviews')->insert($reviewData);
        }

        // Create fictional message data
        $messages = [
            [
                'content' => 'Hey, are you available for a ride?',
                'time' => now(),
                'sender_id' => 1,
                'receiver_id' => 2,
            ],
            [
                'content' => 'Sure, I can give you a ride!',
                'time' => now(),
                'sender_id' => 2,
                'receiver_id' => 1,
            ],
            // Add more fictional message data here...
        ];

        foreach ($messages as $messageData) {
            DB::table('messages')->insert($messageData);
        }

        // Create fictional playlist data
        $playlists = [
            [
                'url' => 'https://example.com/playlist1',
                'user_id' => 1,
            ],
            [
                'url' => 'https://example.com/playlist2',
                'user_id' => 2,
            ],
            // Add more fictional playlist data here...
        ];

        foreach ($playlists as $playlistData) {
            DB::table('playlists')->insert($playlistData);
        }

        // Create fictional genre data
        $genres = [
            ['name' => 'Pop'],
            ['name' => 'Rock'],
            ['name' => 'Hip-Hop'],
            ['name' => 'Electronic'],
            // Add more fictional genre data here...
        ];

        foreach ($genres as $genreData) {
            DB::table('genres')->insert($genreData);
        }

        // Create fictional genre-user relationships
        $userGenres = [
            ['user_id' => 1, 'genre_id' => 1], // User 1 likes Genre 1 (Pop)
            ['user_id' => 1, 'genre_id' => 2], // User 1 likes Genre 2 (Rock)
            ['user_id' => 2, 'genre_id' => 3], // User 2 likes Genre 3 (Hip-Hop)
            // Add more fictional genre-user relationships here...
        ];

        foreach ($userGenres as $userGenreData) {
            DB::table('genre_user')->insert($userGenreData);
        }

        // Create fictional detours
        $tripDetours = [
            ['trip_id' => 1, 'location' => 'Detour A', 'order' => 1], // Detour A for Trip 1
            ['trip_id' => 1, 'location' => 'Detour B', 'order' => 2], // Detour B for Trip 1
            ['trip_id' => 2, 'location' => 'Detour C', 'order' => 1], // Detour C for Trip 2
            // Add more fictional detours here...
        ];

        foreach ($tripDetours as $detourData) {
            DB::table('detours')->insert($detourData);
        }

        // Create fictional payment links
        $userPaymentLinks = [
            ['user_id' => 1, 'url' => 'https://paymentlink1.com'], // Payment link for User 1
            ['user_id' => 2, 'url' => 'https://paymentlink2.com'], // Payment link for User 2
            ['user_id' => 3, 'url' => 'https://paymentlink3.com'], // Payment link for User 3
            // Add more fictional payment links here...
        ];

        foreach ($userPaymentLinks as $paymentLinkData) {
            DB::table('payment_links')->insert($paymentLinkData);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
