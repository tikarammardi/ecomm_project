

SELECT report_id, order_id, product_price,product_quantity FROM reports r, products p
WHERE r.product_id = p.product_id;

ALTER TABLE reports
ADD product_id INT(11)
REFERENCES products(product_id) 
ON DELETE SET NULL;


$sql = "CREATE TRIGGER `updateProductPrice`\n"

    . "BEFORE UPDATE ON `products`\n"

    . "FOR EACH ROW\n"

    . "BEGIN\n"

    . "  IF NEW.product_price <> OLD.product_price\n"

    . "    THEN\n"

    . "      SET NEW.product_price = NEW.product_price * 5.0
    END IFEND";
