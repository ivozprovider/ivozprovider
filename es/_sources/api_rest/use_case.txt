########
Use Case
########

Let's put a little use case as an example: A platform admin wants to obtain the companies of one specific brand (companies are exposed on Brand API only). The operation would be:

.. rubric:: On platform API (https://your-domain/api/platform)

#. Login (request a token) as god admin on /admin_login

#. Search target brand on /brands

#. Get it's domain on /web_portals

#. Get a valid brand administrator on /administrators

.. rubric:: On Brand API (https://brand-domain/api/brand)

#. Impersonate as a brand admin on Auth> /token/exchange (requires a god token and a brand administrator user name obtained in 1-d)

#. Request brand companies using the endpoint /companies

