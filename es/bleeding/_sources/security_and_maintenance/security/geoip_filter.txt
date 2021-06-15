.. _geoip_filter:

############
GeoIP filter
############

:ref:`Virtual PBX clients <vPBX clients>`, :ref:`retail clients` and :ref:`residential clients` can allow traffic from
IPs addresses belonging to chosen countries with the combination of **Filter by IP address** field and **GeoIP countries** selector.

.. warning:: On :ref:`wholesale clients` there is no **Filter by IP address** field as this type of clients are authenticated by IP.

Selecting a country will allow traffic from all addresses of that country. If you want to allow specific IPs, use
:ref:`client_authorized_ip_ranges` instead.

.. error:: Enabling **Filter by IP address** and leaving blank both **GeoIP countries** and **List of authorized sources**
           will prevent all calls.

