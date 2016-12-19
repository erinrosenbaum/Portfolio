-- Certifications Per Position
SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = [all_position_ids]

-- Individual Certifications
SELECT c.id, first_name, last_name, title, date FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id ORDER BY last_name

-- Delete Certification
DELETE FROM certifications WHERE id = [cert_id_input]

-- Display certification to delete
SELECT c.id, first_name, last_name, title, date FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id WHERE c.id=[cert_id_input]

-- Create new certification
INSERT INTO certifications (employee_id, position_id, date) VALUES([employee_id_input],[position_id_input], now())

-- New certification select employee
SELECT id, first_name, last_name FROM employees ORDER BY last_name

-- New certification select position
SELECT id, title FROM positions

-- Display each crew
SELECT e.id, e.last_name, e.first_name, p.title, v.unit_number, eq.Description, eq.Unit_Number, c.name FROM employees e LEFT JOIN positions p ON e.position_id = p.id LEFT JOIN vehicles v ON e.truck_id = v.id LEFT JOIN Equipment eq ON v.trailer_id = eq.id LEFT JOIN crews c ON e.crew_id = c.id WHERE c.id=[crew_id_input] ORDER BY p.id

-- All certifications for an individual crew
SELECT c.id, first_name, last_name, title, date, cr.name FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = [crew_id_input] ORDER BY last_name

-- Number of Certifications Per Position For Crew
SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = [all_crew_ids] AND p.id = [all_position_ids]

-- Display all crews
SELECT id, name FROM crews

-- Edit Crew
UPDATE crews SET name=[name_input] WHERE id=[id]

-- New Crew
INSERT INTO crews (name) VALUES([new_crew_name])

-- Jobs for particular customer
SELECT j.id, j.name, numb, map_directions, start_date, description, completed, c.name as customer FROM jobs j INNER JOIN customers c ON j.customer_id = c.id WHERE c.id=[customer_id_input]

-- Display individual customer
SELECT name, phone, contact_person, email, street, city, state, zip FROM customers WHERE id=[customer_id_input]

-- Display all customers
SELECT id, name, phone, contact_person, email, street, city, state, zip FROM customers

-- Delete Customer
DELETE FROM customers WHERE id = [customer_id_input]

-- Edit Customer
UPDATE customers SET name=[?], phone=[?], contact_person=[?], email=[?], street=[?], city=[?], state=[?], zip=[?] WHERE id=[id]

-- New Customer
INSERT INTO customers (name, phone, contact_person, email, street, city, state, zip) VALUES([?],[?],[?],[?],[?],[?],[?],[?])

-- Delete Employee
DELETE FROM employees WHERE id = [id]

-- Delete Employee show employee
SELECT id, first_name, last_name, email, phone FROM employees WHERE id = [employee_id]

-- Employee
SELECT e.id, first_name, last_name, email, phone, c.name, p.title, v.unit_number, eq.Unit_Number, eq.Description FROM employees e LEFT JOIN crews c ON e.crew_id = c.id LEFT JOIN positions p ON e.position_id = p.id LEFT JOIN vehicles v ON e.truck_id = v.id LEFT JOIN Equipment eq ON v.trailer_id = eq.id WHERE e.id=[employee_id]

-- Edit Employee delete vehicle assignment
UPDATE employees SET first_name=[?], last_name=[?], email=[?], phone=[?], crew_id=[?], position_id=[?], truck_id=NULL WHERE id=[id]

-- Edit Employee
UPDATE employees SET first_name=[?], last_name=[?], email=[?], phone=[?], crew_id=[?], position_id=[?], truck_id=[?] WHERE id=[id]

-- Edit employee select crew
SELECT id, name FROM crews

-- Edit employee select position
SELECT id, title FROM positions

-- Edit employee select vehicle
SELECT v.id, v.unit_number, e.Description, e.Unit_Number FROM vehicles v LEFT JOIN Equipment e ON v.trailer_id = e.id ORDER BY v.unit_number * 1 ASC

-- Certifications for an employee
SELECT c.id, first_name, last_name, title, date FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id WHERE e.id=[id]

-- Employees
SELECT e.id, first_name, last_name, email, phone, c.name, p.title, v.unit_number, eq.Unit_Number, eq.Description FROM employees e LEFT JOIN crews c ON e.crew_id = c.id LEFT JOIN positions p ON e.position_id = p.id LEFT JOIN vehicles v ON e.truck_id = v.id LEFT JOIN Equipment eq ON v.trailer_id = eq.id ORDER BY last_name

-- New Employee
INSERT INTO employees (first_name, last_name, email, phone, crew_id, position_id) VALUES([?],[?],[?],[?],[?],[?])

-- Equipment
SELECT e.id, e.Unit_Number, e.Description, v.unit_number FROM Equipment e LEFT JOIN vehicles v ON v.trailer_id = e.id ORDER BY e.Unit_Number

-- Delete Unit
DELETE FROM Equipment WHERE id = [id]

-- Show Unit
SELECT id, Unit_Number, Description FROM Equipment WHERE id=[id]

-- Edit Unit
UPDATE Equipment SET Unit_Number=?, Description=? WHERE id=[id]

-- New Unit
INSERT INTO Equipment (Unit_Number, Description) VALUES([?],[?])

-- Assign crew to job
INSERT INTO crew_jobs (job_id, crew_id) VALUES([?],[?])

-- Assign crew to job select job
SELECT id, name, numb FROM jobs ORDER BY name

-- Assign crew to job select crew
SELECT id, name FROM crews 

-- Delete job
DELETE FROM jobs WHERE id = [id]

-- Show job to delete
SELECT id, name, numb, map_directions, start_date, description, completed, customer_id FROM jobs WHERE id=[id]

-- Edit job
UPDATE jobs SET name=[?], numb=[?], map_directions=[?], start_date=[?], description=[?], completed=[?] WHERE id=[id]

-- Job
SELECT j.id, j.name, numb, map_directions, start_date, description, completed, c.name as customer FROM jobs j INNER JOIN customers c ON j.customer_id = c.id WHERE j.id=[id]

-- Jobs
SELECT j.id, j.name, numb, map_directions, start_date, description, completed, c.name as customer FROM jobs j INNER JOIN customers c ON j.customer_id = c.id

-- All crew/job relationships
SELECT cj.id, j.name, j.numb, c.name FROM crew_jobs cj INNER JOIN crews c ON cj.crew_id = c.id INNER JOIN jobs j ON cj.job_id = j.id ORDER BY j.name

-- New Job
INSERT INTO jobs (name, numb, map_directions, start_date, description, completed, customer_id) VALUES([?],[?],[?],[?],[?],[?],[?])

-- New job select customer
SELECT id, name FROM customers

-- Delete Position
DELETE FROM positions WHERE id = [id]

-- Show position to delete
SELECT id, title FROM positions WHERE id=[id]

--  Edit Position
UPDATE positions SET title=? WHERE id=[id]

-- New Position
INSERT INTO positions (title) VALUES([?])

-- Position
SELECT id, title FROM positions WHERE id=[id]

-- Positions
SELECT id, title FROM positions

-- Delete Vehicle
DELETE FROM vehicles WHERE id = [id]

-- Show vehicle to delete
SELECT id, unit_number, year, make, model FROM vehicles WHERE id=[id]

-- Edit Vehicle, delete relationship with equipment
UPDATE vehicles SET unit_number=[?], year=[?], make=[?], model=[?], trailer_id=NULL WHERE id=[id]

-- Edit Vehicle
UPDATE vehicles SET unit_number=[?], year=[?], make=[?], model=[?], trailer_id=[?] WHERE id=[id]

-- Edit vehicle select equipment
SELECT id, Unit_Number, Description FROM Equipment ORDER BY Unit_Number

-- New Vehicle
INSERT INTO vehicles (unit_number, year, make, model) VALUES([?],[?],[?],[?])

-- Vehicle
SELECT v.id, v.unit_number, year, make, model, e.unit_number, e.description FROM vehicles v LEFT JOIN Equipment e ON v.trailer_id = e.id WHERE v.id=[id]

-- Vehicles
SELECT v.id, v.unit_number, year, make, model, e.unit_number, e.description, em.first_name, em.last_name FROM vehicles v LEFT JOIN Equipment e ON v.trailer_id = e.id LEFT JOIN employees em ON em.truck_id = v.id ORDER BY v.unit_number * 1 ASC