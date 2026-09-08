<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Hotel\Hotel;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Create Demo Users
        $demoUser = User::updateOrCreate(
            ['email' => 'guest@shekinah.com'],
            [
                'name' => 'Shekinah Guest',
                'password' => Hash::make('password123'),
            ]
        );

        $adminUser = User::updateOrCreate(
            ['email' => 'admin@shekinah.com'],
            [
                'name' => 'Shekinah Concierge',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Create Luxury Hotels
        $hotel1 = Hotel::updateOrCreate(
            ['name' => "Shekinah Grand Palace & Spa"],
            [
                'image' => 'image_2.jpg',
                'description' => 'An iconic luxury sanctuary situated along the coast, offering world-class spa retreats, Michelin-standard dining, and panoramic ocean vistas.',
                'location' => 'Malibu Coast, California',
                'rating' => 4.9,
            ]
        );

        $hotel2 = Hotel::updateOrCreate(
            ['name' => "Shekinah Royal Heights & Suites"],
            [
                'image' => 'image_3.jpg',
                'description' => 'Urban luxury redefined in the heart of the metropolis. Features breathtaking skyline infinity pool, private butler service, and lavish penthouses.',
                'location' => 'Downtown Manhattan, New York',
                'rating' => 4.8,
            ]
        );

        $hotel3 = Hotel::updateOrCreate(
            ['name' => "Shekinah Sanctuary Island Resort"],
            [
                'image' => 'image_4.jpg',
                'description' => 'A private tropical island escape featuring overwater villas, crystal lagoons, sunset cruises, and tranquil holistic wellness pavilions.',
                'location' => 'Bora Bora, French Polynesia',
                'rating' => 5.0,
            ]
        );

        $hotel4 = Hotel::updateOrCreate(
            ['name' => "Shekinah Alpine Chalet & Wellness"],
            [
                'image' => 'image_5.jpg',
                'description' => 'Nestled amidst snow-capped peaks, offering ski-in/ski-out luxury, fireside lounge, heated infinity mineral pool, and gourmet dining.',
                'location' => 'Zermatt, Swiss Alps',
                'rating' => 4.9,
            ]
        );

        // 3. Create Apartments / Luxury Suites
        Apartment::updateOrCreate(
            ['name' => 'Presidential Oceanfront Suite', 'hotel_id' => $hotel1->id],
            [
                'image' => 'room-1.jpg',
                'max_persons' => 4,
                'size' => 120,
                'view' => 'Panoramic Ocean View',
                'num_beds' => 2,
                'price' => 450.00,
                'description' => 'Experience the pinnacle of coastal luxury with expansive floor-to-ceiling windows, private infinity jacuzzi, master marble bathroom, and 24/7 dedicated butler service.',
            ]
        );

        Apartment::updateOrCreate(
            ['name' => 'Royal Penthouse Sky Suite', 'hotel_id' => $hotel2->id],
            [
                'image' => 'room-2.jpg',
                'max_persons' => 6,
                'size' => 180,
                'view' => 'Skyline City View',
                'num_beds' => 3,
                'price' => 680.00,
                'description' => 'Perched atop the highest floor, this palatial penthouse features a private wrap-around terrace, bespoke Italian designer furnishings, and champagne bar.',
            ]
        );

        Apartment::updateOrCreate(
            ['name' => 'Deluxe Island Garden Villa', 'hotel_id' => $hotel3->id],
            [
                'image' => 'room-3.jpg',
                'max_persons' => 2,
                'size' => 85,
                'view' => 'Tropical Lagoon View',
                'num_beds' => 1,
                'price' => 320.00,
                'description' => 'Surrounded by lush tropical flora with direct private beach access, outdoor rain shower, king plush canopy bed, and secluded sun deck.',
            ]
        );

        Apartment::updateOrCreate(
            ['name' => 'Executive Sunset Suite', 'hotel_id' => $hotel1->id],
            [
                'image' => 'room-4.jpg',
                'max_persons' => 3,
                'size' => 95,
                'view' => 'Pacific Sunset View',
                'num_beds' => 2,
                'price' => 390.00,
                'description' => 'Immerse in golden hour elegance with custom acoustic sound system, deep soaking bathtub overlooking the coast, and curated wine cellar.',
            ]
        );

        Apartment::updateOrCreate(
            ['name' => 'Signature Alpine Haven', 'hotel_id' => $hotel4->id],
            [
                'image' => 'room-5.jpg',
                'max_persons' => 4,
                'size' => 110,
                'view' => 'Matterhorn Mountain View',
                'num_beds' => 2,
                'price' => 420.00,
                'description' => 'Rustic elegance meets modern opulence with stone fireplace, heated cedar floors, private cedar sauna, and unobstructed alpine views.',
            ]
        );

        Apartment::updateOrCreate(
            ['name' => 'Ambassador Grand Suite', 'hotel_id' => $hotel2->id],
            [
                'image' => 'room-6.jpg',
                'max_persons' => 4,
                'size' => 135,
                'view' => 'Central Park & Skyline View',
                'num_beds' => 2,
                'price' => 540.00,
                'description' => 'A spacious haven boasting an executive study, formal dining lounge, walk-in dressing room, and state-of-the-art entertainment center.',
            ]
        );

        // 4. Sample Confirmed Booking for Demo User
        Booking::updateOrCreate(
            ['user_id' => $demoUser->id, 'room_name' => 'Presidential Oceanfront Suite'],
            [
                'name' => 'Shekinah Guest',
                'email' => 'guest@shekinah.com',
                'phone_number' => '+1 (555) 382-9901',
                'check_in' => now()->addDays(5)->format('Y-m-d'),
                'check_out' => now()->addDays(8)->format('Y-m-d'),
                'duration' => 3,
                'price' => 1350.00,
                'hotel_name' => "Shekinah Grand Palace & Spa",
                'status' => 'Confirmed',
            ]
        );
    }
}
