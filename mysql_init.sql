-- Remove permissões de login do root
ALTER USER 'root'@'%' IDENTIFIED BY 'root_password';
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root_password';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'root'@'%';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'root'@'localhost';

-- Criar um usuário personalizado com permissões
CREATE USER 'custom_user'@'%' IDENTIFIED BY 'custom_password';
GRANT ALL PRIVILEGES ON *.* TO 'custom_user'@'%';
FLUSH PRIVILEGES;
