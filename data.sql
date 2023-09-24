--data dump

INSERT INTO product (memID, memFirst, memLast, phone, email, streetName, suburb, state, postcode, dob)
VALUES
('1', 'Ella', 'Smith', '0412345678', 'ella.smith@example.com', '123 Main Street', 'Sydney', 'NSW', '2000', '1985-05-12'),
('2', 'Liam', 'Brown', '0437123456', 'liam.brown@example.com', '456 Elm Avenue', 'Melbourne', 'VIC', '3000', '1990-09-22'),
('3', 'Olivia', 'Wilson', '0401234567', 'olivia.wilson@example.com', '789 Oak Road', 'Brisbane', 'QLD', '4000', '1988-03-15'),
('4', 'Noah', 'Jones', '0422987654', 'noah.jones@example.com', '1010 Pine Street', 'Perth', 'WA', '6000', '1976-11-03'),
('5', 'Ava', 'Taylor', '0410876543', 'ava.taylor@example.com', '222 Willow Lane', 'Adelaide', 'SA', '5000', '1995-07-19'),
('6', 'William', 'Anderson', '0434567890', 'william.anderson@example.com', '333 Birch Close', 'Hobart', 'TAS', '7000', '1982-02-28'),
('7', 'Mia', 'White', '0423456789', 'mia.white@example.com', '444 Cedar Street', 'Canberra', 'ACT', '2600', '1972-04-07'),
('8', 'James', 'Martin', '0411234567', 'james.martin@example.com', '555 Redwood Drive', 'Darwin', 'NT', '0800', '1989-12-10'),
('9', 'Sophia', 'Johnson', '0435678901', 'sophia.johnson@example.com', '666 Maple Avenue', 'Gold Coast', 'QLD', '4000', '1992-06-25'),
('10', 'Benjamin', 'Harris', '0420987654', 'benjamin.harris@example.com', '777 Oak Lane', 'Perth', 'WA', '6000', '1983-08-05'),
('11', 'Charlotte', 'Thompson', '0412345678', 'charlotte.thompson@example.com', '888 Elm Street', 'Sydney', 'NSW', '2000', '1986-01-14'),
('12','Jackson', 'Lewis', '0437123456', 'jackson.lewis@example.com', '999 Pine Road', 'Melbourne', 'VIC', '3000', '1978-10-29'),
('13','Amelia', 'Walker', '0401234567', 'amelia.walker@example.com', '111 Willow Avenue', 'Brisbane', 'QLD', '4000', '1993-09-07'),
('14','Lucas', 'Hall', '0422987654', 'lucas.hall@example.com', '222 Birch Close', 'Adelaide', 'SA', '5000', '1984-12-18'),
('15','Emma', 'Davis', '0410876543', 'emma.davis@example.com', '333 Cedar Lane', 'Hobart', 'TAS', '7000', '1975-02-02');

INSERT INTO product (PdID, pdName, category, price, supplier, description)
VALUES
(1, 'Organic Brown Rice', 'Grains', 3.99, 'Organic Farms Ltd.', 'Certified organic brown rice for healthy meals.'),
(2, 'Extra Virgin Olive Oil', 'Cooking Oils', 6.49, 'Global Foods Inc.', 'Premium quality extra virgin olive oil for cooking.'),
(3, 'Canned Tomato Soup', 'Canned Goods', 1.99, 'National Canners', 'Classic tomato soup for a comforting meal.'),
(4, 'Whole Wheat Bread', 'Bakery', 2.49, 'Bread Master Bakeries', 'Nutritious whole wheat bread for sandwiches.'),
(5, 'Fresh Apples', 'Fruits', 4.99, 'Local Orchard Farms', 'Crisp and sweet apples from local orchards.'),
(6, 'Ground Coffee', 'Beverages', 5.99, 'Java Beans Roastery', 'Freshly ground coffee beans for your morning brew.'),
(7, 'Frozen Mixed Vegetables', 'Frozen Foods', 2.79, 'Frozen Delights Inc.', 'A mix of frozen peas, carrots, and corn.'),
(8, 'Natural Almonds', 'Nuts & Seeds', 7.99, 'Healthy Nuts Co.', 'Natural almonds for snacking and baking.'),
(9, 'Organic Spinach', 'Produce', 3.49, 'Organic Farms Ltd.', 'Organic baby spinach leaves for salads.'),
(10, 'Pure Honey', 'Pantry', 4.29, 'Honey Bee Farms', 'Pure and natural honey from local beekeepers.'),
(11, 'Canned Tuna in Olive Oil', 'Canned Goods', 2.89, 'Ocean Harvest', 'Tuna packed in rich olive oil for flavor.'),
(12, 'Creamy Peanut Butter', 'Pantry', 2.99, 'Nutty Delights', 'Smooth and creamy peanut butter spread.'),
(13, 'Bottled Spring Water', 'Beverages', 0.99, 'Crystal Springs', 'Refreshing spring water for hydration.'),
(14, 'Mixed Berry Jam', 'Condiments', 3.49, 'Jammy Goodness', 'Sweet and tangy mixed berry jam for toast.'),
(15, 'Lemon Dishwashing Liquid', 'Household', 1.79, 'Clean & Fresh Supplies', 'Effective lemon-scented dishwashing liquid.');

INSERT INTO sale (saleID, memID, pdID, saleDate, salePrice, quantity)
VALUES
(1, 1, 3, '2023-09-01', 5.99, 2),
(2, 2, 7, '2023-09-02', 2.49, 3),
(3, 3, 12, '2023-09-03', 3.99, 1),
(4, 4, 5, '2023-09-04', 1.79, 4),
(5, 5, 10, '2023-09-05', 4.29, 2),
