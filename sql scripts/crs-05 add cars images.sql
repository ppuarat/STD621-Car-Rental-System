
INSERT IGNORE INTO car_images (fk_car_id, caption, image_src)
SELECT id, concat(brand, "-", model) as caption, concat(LOWER(brand), "-", LOWER(model), ".png")  FROM cars;
