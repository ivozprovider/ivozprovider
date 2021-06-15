*************
DDI Providers
*************

DDI Providers are the SIP entities that will contact the platform when someone calls to one of our client's DDIs.

This are the fields that define a carrier:

.. hint:: Some fields described below may not be visible depending on enabled features.

.. glossary::

    Name
        Used to reference this Carrier.

    Description
        Optional field with any required extra information.

    Numeric Transformation
        Transformation that will be applied to the origin and destination of the
        outgoing numbers that use this Carrier
        (see :ref:`Numeric transformations`).

    Local socket
        Selected address will be used as source address for signalling with this DDI provider. Brand operator can choose among
        addresses assigned by main operator via :ref:`Brands`. Read :ref:`Proxy Trunks` for further details.

    Media relay set
        Media-relays can be grouped in sets to reserve capacities or on a geographical purpose. Selected set will be used
        in calls through this specific DDI Provider. This field in only seen by Global administrator (aka God).

.. hint:: If you want carrier-side media handled by the same mediarelay set than client-side, select "Client's default".

DDI Provider Addresses
**********************

The platform will recognize a DDI provider comparing SIP message's source address with the addresses in this list:

.. glossary::

    IP address
        Used to reference this Carrier.

    Description
        Optional field with any required extra information.

.. tip:: Once the DDI provider is recognized, its numeric transformations will be applied and the DDI will be searched.


DDI Provider Registrations
**************************

Some DDI providers require a `SIP Register
<https://tools.ietf.org/html/rfc3261#section-10>`_ active in order to receive
incoming calls to our DDIs. Some of them, even require this register in order
to process our outgoing calls through their services.

.. note:: IvozProvider supports any kind of *peering*, but we highly recommend
   *peer to peer peerings*: without authentication, without registry and
   validated by IP. This will avoid unnecessary traffic (authentication in each
   session and periodic registers) and simplifies its configuration, leaving this list empty.

To define a registration, these fields are shown:

.. glossary::

    Username
        Account number or similar provider by the provider that requires SIP
        register.

    Domain
        Domain or IP of the registrar server. Usually the same as the SIP proxy
        of the Peer server.

    Password
        Password used in auth process.

    Random contact Username
        If set, no contact username will be needed as a random string will be used. The
        DDI Provider is supposed to use the called DDI in the R-URI instead of this random string.

    Contact username
        This will be used in REGISTER message Contact header, making DDI provider to
        contact us with this in the R-URI.

    Auth username
        Authentication user. Most of the time it's the same as username, so
        it's recommended to leave empty.

    Register server URI
        Usually this can be left empty, as it can be obtained from the
        Domain. If it is not the case, enter the IP address with the 'sip:'
        prefix.

    Realm
        Leave empty to accept the authentication realm proposed by the provider.
        Define only if you are familiar to the authentication mechanism used
        in SIP.

    Expire
        Default suggested register expire time.

.. tip:: Similar to the Carrier Servers, there are lots of fields in the screen.
   You must have into account that most of the providers don't require register,
   and those who do, will only use user, domain and password.
