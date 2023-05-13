# Configurar Entorno virtual

Crear base de datos:
```
mysql -u your_user -p < database/crear.sql
```
Inicia servidor:
```
php -S localhost:8000 -t public/
```
o  

## Windows
xampp:
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/mvc_moderno_php/public"
    ServerName mvc_moderno_php
</VirtualHost>
```

En el directorio: C:\Windows\System32\drivers\etc\hosts  
agrega:
```
127.0.0.1      mvc_moderno_php.test 
```
