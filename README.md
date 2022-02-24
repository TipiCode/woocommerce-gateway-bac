<h1 align="center">
  <img src="https://skyloft.sfo3.cdn.digitaloceanspaces.com/Repos/woo-bac.png" alt="Bac">
</h1>

[![GitHub license](https://img.shields.io/github/license/TipiCode/woocommerce-gateway-bac.svg)](https://github.com/TipiCode/woocommerce-gateway-bac/blob/master/LICENSE)
[![GitHub release](https://img.shields.io/github/v/release/TipiCode/woocommerce-gateway-bac.svg)](https://github.com/TipiCode/woocommerce-gateway-bac/releases)
[![Github all releases](https://img.shields.io/github/downloads/TipiCode/woocommerce-gateway-bac/total.svg)](https://GitHub.com/TipiCode/woocommerce-gateway-bac/releases/)
[![Generic badge](https://img.shields.io/badge/Woocommerce-6.1.0-96588a.svg)](https://woocommerce.com/)
[![Generic badge](https://img.shields.io/badge/Wordpress-5.9.0-21759b.svg)](https://wordpress.com/)

Plugin para [Woocommerce](https://woocommerce.com/) que habilita la pasarela de pago de [BAC](https://www.baccredomatic.com/es-gt) como método de pago en el checkout de tú sitio web, implementar una pasarela de pago para realizar cobros en linea no tiene porque ser ciencia espacial.

## Primeros pasos
Te compartimos cuáles son los primeros pasos para poder adquirir el servicio por parte del [BAC](https://www.baccredomatic.com/es-gt)

### 💬 Aclaraciones
El [BAC](https://www.baccredomatic.com/es-gt) trabaja con un proveedor que les brinda la pasarela de pago llamado [First Atlantic Commerce](https://firstatlanticcommerce.com/) ten en cuenta esto ya que al momento de estar en el proceso de implementación el personal de [First Atlantic Commerce](https://firstatlanticcommerce.com/) será el encargado de verificar la instalación y dar el visto bueno al personal del BAC. Este plugin utiliza la modalidad <strong>Hosted Page</strong> quiere decir que redirecciona a los servidores de [First Atlantic Commerce](https://firstatlanticcommerce.com/) para realizar el cobro.
<h1 align="center">
  <img src="https://skyloft.sfo3.cdn.digitaloceanspaces.com/Repos/first-atlantic.png" alt="First Atlantic">
</h1>

### 📌 ¿Donde adquiero el servicio de la pasarela de pago del BAC?
Para solicitar la activación de esta pasarela debes ir al edificio del [BAC](https://www.baccredomatic.com/es-gt) ubicado en [Torre Bac Credomatic](https://maps.app.goo.gl/x8DExmr8cJ5UJkgP9) si te acercas a cualquier agencia del [BAC](https://www.baccredomatic.com/es-gt) te referirán a estas instalaciones. En el lugar te asignará un asesor que te guiará por el proceso de adquisición e integración. 

### 📃 ¿Cuales son los requisitos?
Para poder adquirir el servicio de la pasarela de pago necesitas lo siguiente:  
- DPI vigente ambos lados
- Patente de comercio 
- NIT o RTU
- Recibo de luz de donde se ubica la empresa 
- Cuenta BAC 

### 💰 ¿Cual es el costo?
A continuación te desglosamos los costos que tiene esta pasarela para que te informes antes de adquirir el servicio.
- Pago por afiliación nueva <strong>$25.00 (Pago único)</strong>
- Integración a la pasarela FAC <strong>$200.00 (Pago único)</strong>
- Mensualidad del servicio <strong>$50.00</strong>
- Tasa de comisión del <strong>5.00%</strong> en cada cobro 
- <strong>$0.20</strong> centavos por cada transacción por pasar por un protocolo de seguridad 3D Secure
- Son agentes retenedores de IVA 

### ℹ️ Información adicional
Deberás entregar a tu asesor los requisitos y llenar unos formularios que te brindarán para poder iniciar el proceso.

## Guía de uso
A continuacion encontraras como configurar el plugin dentro de tu sitio web de [Wordpress](https://wordpress.com/) y te contaremos un poco como es el proceso de integración con el personal técnico de [First Atlantic Commerce](https://firstatlanticcommerce.com/).

### 🌐 Configuración del lado del portal brindado por FAC
Una vez te brinden el acceso a tú portal, ingresa al mismo desde el siguiente link.
- [Test](https://ecm.firstatlanticcommerce.com/SENTRY/PaymentGateway/Merchant/Administration/WFrmLogin.aspx)
- [Producción](https://marlin.firstatlanticcommerce.com/SENTRY/PaymentGateway/Merchant/Administration/WFrmLogin.aspx)

** Recuerda que este plugin utiliza la modalidad de <strong>Hosted Checkout</strong> para operar, dentro del portal puedes customizar la apariencia de este sitio de cobro con HTML y CSS.

Una vez estés dentro del portal de [First Atlantic Commerce](https://firstatlanticcommerce.com/) debes ir a la opción de <strong>Administration / Profile / Hosted Payment Pages</strong> dentro de esta pagina podras crear páginas, editar, borrar y publicar paginas para recibir cobros.

Para crear una nueva página ve a la opción de <strong>New</strong>esto te mostrará un formulario con los siguientes datos para llenar:
- <strong>Page Set:</strong> Nombre con el cual se llamará  a la página al momento de realizar el checkout.
- <strong>Name:</strong> Nombre por el cual guardaras la página dentro de la pasarela.
- <strong>Template:</strong> Aquí selecciona 🔵 <strong>Checkout With Validation, selective 3DS</strong>.
- <strong>Email Status:</strong> Aquí coloca tu correo electrónico.

Una vez creada la página puedes editar su estilo para que se adapte a tu tema en Wordpress, una vez estilizado no olvides precionar la opcion de <strong>Save HTML</strong> seguido de <strong>Publish to Gateway</strong>

### 💿 Instalación
Requisitos de instalacion
- Contar con [Woocommerce](https://woocommerce.com/) instalado dentro de tu sitio web.
- Haber completado el proceso de solicitud de servicio con el [BAC](https://www.baccredomatic.com/es-gt).

Simplemente clona el repositorio, genera un archivo .Zip y súbelo como plugin a tu sitio web de [Wordpress](https://wordpress.com/), recuerda que [Woocommerce](https://woocommerce.com/) debe de estar instalado en el sitio para poder habilitar el plugin.

### ⚙️ Configuración
Una vez instalado debes dirigirte al area de <strong>Woocommerce / Ajustes / Pagos</strong> , aqui podras encontrar tu forma de pago bajo el nombre de <strong>FAC Payment Gateway</strong> aqui podrás gestionar las opciones del plugin. 

<strong>Opciones de configuración</strong>
- <strong>Activar/Desactivar :</strong> Con esta opción puede rápidamente habilitar o deshabilitar la pasarela de pago sin desinstalar el plugin.
- <strong>Título :</strong> Nombre que se le mostrará al usuario al seleccionar la opción de pago.
- <strong>Descripción :</strong> Descripcion adicional que se le mostrara al usuario al seleccionar la opción de pago.
- <strong>Status of new order :</strong> Estado el cual [Woocommerce](https://woocommerce.com/) colocará cuando una orden es creada, este estado cambia a Completed cuando el checkout de FAC regresa Success.
- <strong>FacId : </strong> Id brindado por [BAC](https://www.baccredomatic.com/es-gt).
- <strong>Contraseña : </strong> Contraseña brindada por [BAC](https://www.baccredomatic.com/es-gt).
- <strong>AcquirerId : </strong> Id brindado por [BAC](https://www.baccredomatic.com/es-gt).
- <strong>Page set name : </strong> Nombre con el cual se guardo el Hosted Page en el portal de [First Atlantic Commerce](https://firstatlanticcommerce.com/)
- <strong>Page name : </strong> Nombre con el cual se guardo el Hosted Page en el portal de [First Atlantic Commerce](https://firstatlanticcommerce.com/)
- <strong>Domain : </strong> Dominio al cual realizar la llamada, ambos dominios para test o producción son brindados por [BAC](https://www.baccredomatic.com/es-gt).
- <strong>Debug Log : </strong> Habilita la opcion d poder guardar un log.
- <strong>Error message : </strong> Este es un mensaje personalizado que se le muestra al usuario al momento que ocurra un error.

### ✅ Pruebas
¡Enhorabuena! Ya tienes tu plugin configurado y listo para las pruebas, [First Atlantic Commerce](https://firstatlanticcommerce.com/) requiere que realices al menos 3 transacciones de prueba con cada proveedor de tarjetas soportado los cuales son <strong>Visa / Mastercard / American Express</strong> a continuación te compartimos las tarjetas que puedes utilizar para probar.
- Visa / <strong>4111111111111111</strong> / Cualquier Fecha de expiración y cualquier CVV.
- Master Card / <strong>5111111111111111</strong> / Cualquier Fecha de expiración y cualquier CVV.
- American Express / <strong>341111111111111</strong> / Cualquier Fecha de expiración y cualquier CVV.

[Aquí](https://firstatlanticcommerce.com/wp-content/uploads/2020/07/FACPG2-Test-Card-Information.pdf) podrás encontrar todas las tarjetas de prueba disponibles con sus diferentes códigos de respuesta. 

Una vez realizadas las pruebas comunicate con tu asesor para que inicien la revisión y te puedan brindar tus credenciales de producción.

## ¿Como contribuir?
¡Nos encantaría que puedas formar parte de esta comunidad, si deseas contribuir eres libre de hacerlo! te dejamos a continuación documentación oficial de las integraciones con  [First Atlantic Commerce](https://firstatlanticcommerce.com/) para que puedas hecharle un vistazo.
- [API Documentation](https://firstatlanticcommerce.com/wp-content/uploads/2020/07/FACPG2-v.1.4-Quick-Start-Integration-Guide.pdf)
- [Hosted Page Documentation](https://firstatlanticcommerce.com/wp-content/uploads/2020/02/FACPG2-v1.7-Hosted-Page-Implementation.pdf)
