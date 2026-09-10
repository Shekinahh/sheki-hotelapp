-- ============================================================================
-- SHEKINAH LUXURY HOTEL & RESIDENCES - SUPABASE POSTGRESQL SCHEMA & SEED DATA
-- Run this in your Supabase SQL Editor if you prefer direct database setup.
-- ============================================================================

-- 1. Users Table
CREATE TABLE IF NOT EXISTS users (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

-- 2. Hotels Table
CREATE TABLE IF NOT EXISTS hotels (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NULL,
    description TEXT NULL,
    location VARCHAR(255) NULL,
    rating NUMERIC(2,1) DEFAULT 4.9,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

-- 3. Apartments / Suites Table
CREATE TABLE IF NOT EXISTS apartments (
    id BIGSERIAL PRIMARY KEY,
    hotel_id BIGINT REFERENCES hotels(id) ON DELETE CASCADE,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NULL,
    max_persons INTEGER DEFAULT 2,
    size INTEGER DEFAULT 45,
    view VARCHAR(255) DEFAULT 'Ocean View',
    num_beds INTEGER DEFAULT 1,
    price NUMERIC(10,2) DEFAULT 150.00,
    description TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

-- 4. Bookings Table
CREATE TABLE IF NOT EXISTS bookings (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT REFERENCES users(id) ON DELETE CASCADE,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    duration INTEGER DEFAULT 1,
    price NUMERIC(10,2) DEFAULT 0.00,
    hotel_name VARCHAR(255) NULL,
    room_name VARCHAR(255) NULL,
    status VARCHAR(50) DEFAULT 'Confirmed',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

-- 5. Seed Demo Users
INSERT INTO users (id, name, email, password, created_at, updated_at) VALUES
(1, 'Shekinah Guest', 'guest@shekinah.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 'Shekinah Concierge', 'admin@shekinah.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
ON CONFLICT (email) DO NOTHING;

-- 6. Seed Luxury Hotels
INSERT INTO hotels (id, name, image, description, location, rating, created_at, updated_at) VALUES
(1, 'Shekinah Grand Palace & Spa', 'image_2.jpg', 'An iconic luxury sanctuary situated along the coast, offering world-class spa retreats, Michelin-standard dining, and panoramic ocean vistas.', 'Malibu Coast, California', 4.9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 'Shekinah Royal Heights & Suites', 'image_3.jpg', 'Urban luxury redefined in the heart of the metropolis. Features breathtaking skyline infinity pool, private butler service, and lavish penthouses.', 'Downtown Manhattan, New York', 4.8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 'Shekinah Sanctuary Island Resort', 'image_4.jpg', 'A private tropical island escape featuring overwater villas, crystal lagoons, sunset cruises, and tranquil holistic wellness pavilions.', 'Bora Bora, French Polynesia', 5.0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 'Shekinah Alpine Chalet & Wellness', 'image_5.jpg', 'Nestled amidst snow-capped peaks, offering ski-in/ski-out luxury, fireside lounge, heated infinity mineral pool, and gourmet dining.', 'Zermatt, Swiss Alps', 4.9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
ON CONFLICT (id) DO NOTHING;

-- 7. Seed Luxury Suites & Apartments
INSERT INTO apartments (id, hotel_id, name, image, max_persons, size, view, num_beds, price, description, created_at, updated_at) VALUES
(1, 1, 'Presidential Oceanfront Suite', 'room-1.jpg', 4, 120, 'Panoramic Ocean View', 2, 450.00, 'Experience the pinnacle of coastal luxury with expansive floor-to-ceiling windows, private infinity jacuzzi, master marble bathroom, and 24/7 dedicated butler service.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(2, 2, 'Royal Penthouse Sky Suite', 'room-2.jpg', 6, 180, 'Skyline City View', 3, 680.00, 'Perched atop the highest floor, this palatial penthouse features a private wrap-around terrace, bespoke Italian designer furnishings, and champagne bar.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(3, 3, 'Deluxe Island Garden Villa', 'room-3.jpg', 2, 85, 'Tropical Lagoon View', 1, 320.00, 'Surrounded by lush tropical flora with direct private beach access, outdoor rain shower, king plush canopy bed, and secluded sun deck.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4, 1, 'Executive Sunset Suite', 'room-4.jpg', 3, 95, 'Pacific Sunset View', 2, 390.00, 'Immerse in golden hour elegance with custom acoustic sound system, deep soaking bathtub overlooking the coast, and curated wine cellar.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(5, 4, 'Signature Alpine Haven', 'room-5.jpg', 4, 110, 'Matterhorn Mountain View', 2, 420.00, 'Rustic elegance meets modern opulence with stone fireplace, heated cedar floors, private cedar sauna, and unobstructed alpine views.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(6, 2, 'Ambassador Grand Suite', 'room-6.jpg', 4, 135, 'Central Park & Skyline View', 2, 540.00, 'A spacious haven boasting an executive study, formal dining lounge, walk-in dressing room, and state-of-the-art entertainment center.', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
ON CONFLICT (id) DO NOTHING;

-- 8. Synchronize PostgreSQL Primary Key Sequences (prevents duplicate key 500 error on new registrations and bookings)
SELECT setval(pg_get_serial_sequence('users', 'id'), COALESCE(MAX(id), 1)) FROM users;
SELECT setval(pg_get_serial_sequence('hotels', 'id'), COALESCE(MAX(id), 1)) FROM hotels;
SELECT setval(pg_get_serial_sequence('apartments', 'id'), COALESCE(MAX(id), 1)) FROM apartments;
SELECT setval(pg_get_serial_sequence('bookings', 'id'), COALESCE(MAX(id), 1)) FROM bookings;

