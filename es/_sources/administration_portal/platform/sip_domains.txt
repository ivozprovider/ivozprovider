.. _god_sipdomains:

SIP domains
-----------

The section **Domains** will display the SIP domains that point to :ref:`ProxyUsers` public address.

.. note:: DNS register can be type A (supported by all the hardphones/softphones
   ) or even NAPTR+SRV.

There are two type of SIP domains:

.. glossary::

    vPBX client SIP domain
        Each vPBX client has a unique SIP domain.

    Brand SIP domain
        Shared by all retail and residential clients in the brand.

All these SIP domains will be displayed in this list so that global administrator can check
what domains are registered for each client/brand:

.. glossary::

    Domain
        DNS pointing to :ref:`ProxyUsers` public address

    Brand
        Brand of specific brand domain or vPBX client.

    Client
        vPBX client of specific vPBX client domain. Empty for brand domains.
