

SELECT report_id, order_id, product_price,product_quantity FROM reports r, products p
WHERE r.product_id = p.product_id;

ALTER TABLE reports
ADD product_id INT(11)
REFERENCES products(product_id) 
ON DELETE SET NULL;
