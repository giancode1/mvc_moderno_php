# Configurar Entorno virtual

## Windows
xampp:
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/proyecto_mvc/public"
    ServerName proyecto_mvc
</VirtualHost>
```

En el directorio: C:\Windows\System32\drivers\etc\hosts  
agrega:
```
127.0.0.1      proyecto_mvc.test 
```

Visita:
```
http://proyecto_mvc.test  
http://proyecto_mvc.test/about  
http://proyecto_mvc.test/contact  
```