CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    country VARCHAR(100) NOT NULL,
    message TEXT,
    service_customer TINYINT(1) DEFAULT 0,
    service_marchand TINYINT(1) DEFAULT 0,
    service_retailer TINYINT(1) DEFAULT 0,
    service_delivery TINYINT(1) DEFAULT 0,
    notify TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO contacts (
    name, phone_number, email, country, message,
    service_customer, service_marchand, service_retailer, service_delivery, notify
) VALUES
('Jean-Claude Mba', '695123456', 'jcmba@example.cm', 'cmr', 'Je suis intéressé par les coupons de réduction.', 1, 0, 0, 0, 1),
('Agnès Ndongo', '678987654', 'agnes.ndongo@example.cm', 'cmr', 'Je souhaite ouvrir une boutique en ligne.', 0, 1, 0, 0, 1),
('Simon Tchoua', '699112233', 'simon.tchoua@example.cm', 'cmr', 'Je cherche des détaillants pour mes produits.', 0, 0, 1, 0, 0),
('Brigitte Nseke', '677445566', 'brigitte.nseke@example.cm', 'cmr', 'Je veux offrir un service de livraison dans ma ville.', 0, 0, 0, 1, 1),
('Emmanuel Ngassa', '690001122', 'emmanuel.ngassa@example.cm', 'cmr', 'Je veux recevoir des mises à jour et des offres.', 1, 1, 0, 0, 1);
