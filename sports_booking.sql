-- Database: sports_booking

CREATE TABLE centers (
    center_id INT AUTO_INCREMENT PRIMARY KEY,
    center_name VARCHAR(255) NOT NULL
);

INSERT INTO centers (center_name) VALUES ('Indiranagar'), ('Koramangala');

CREATE TABLE sports (
    sport_id INT AUTO_INCREMENT PRIMARY KEY,
    center_id INT,
    sport_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (center_id) REFERENCES centers(center_id)
);

INSERT INTO sports (center_id, sport_name) VALUES 
(1, 'Badminton'), (1, 'Tennis'), (1, 'Squash'), 
(2, 'Ping Pong'), (2, 'Badminton'), (2, 'Basketball');

CREATE TABLE resources (
    resource_id INT AUTO_INCREMENT PRIMARY KEY,
    sport_id INT,
    resource_name VARCHAR(255),
    FOREIGN KEY (sport_id) REFERENCES sports(sport_id)
);

INSERT INTO resources (sport_id, resource_name) VALUES
(1, 'Court 1'), (1, 'Court 2'), (1, 'Court 3'),
(2, 'Court 1'), (2, 'Court 2'),
(3, 'Squash Court'),
(4, 'Table 1'), (4, 'Table 2'), (4, 'Table 3'),
(5, 'Court 1'), (5, 'Court 2'),
(6, 'Court 1'), (6, 'Court 2');

CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255),
    booking_date DATE,
    time_slot TIME,
    center_id INT,
    sport_id INT,
    resource_id INT,
    FOREIGN KEY (center_id) REFERENCES centers(center_id),
    FOREIGN KEY (sport_id) REFERENCES sports(sport_id),
    FOREIGN KEY (resource_id) REFERENCES resources(resource_id),
    UNIQUE (booking_date, time_slot, resource_id)
);
