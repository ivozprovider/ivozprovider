*******************
Brand Configuration
*******************

We need that the default DemoBrand has a client with at least 2 users. In
order to achieve this we will require a little configuration in this section.

In fact, if we check **Virtual PBXs** in the brand menu, we'll discover that there
is already an existing *DemoCompany* that we can use to fulfill our desired
goal :)

Only a thing is required to configure for this client, pressing **Edit client** option.

.. _domain_per_client:

Client SIP Domain
==================

As mentioned in the previous section, is **required** that each of the vPBX clients
has a public domain that resolves to the configured IP address for
:ref:`proxyusers`.

.. note:: DNS register can be type A (supported by all the hardphones/softphones
   ) or even NAPTR+SRV.

Once the domain has been configured (by means that are out of scope of this
document), it will be enough to write it in our client configuration **SIP Domain** field.

Once the client has been saved, the domain will be also displayed in the list in the column **SIP domain**.

.. attention:: It's important to understand this block. :ref:`Unless we've a
   single client registered <dnshack>`, without a DNS domain pointing to our
   users proxy IP address, everything will fail.

.. danger:: Have we repeated enough that without a properly configured DNS
   pointing to the Users proxy IP address nothing will work?

.. _dnshack:

I have no time for a DNS registry
---------------------------------

Everything we have said is true: as we create new brands and brands create new
clients, each of them will need a DNS registry.

But the first client of the platform is quite special and can take over the IP
address of the proxy to use it as a domain.

Although it is not a domain, but being used like it was, it will be displayed
in :ref:`SIP Domains` section.

.. tip:: It’s important to understand the this trick is only valid for the first
   client of the platform ;)

.. _emulate_client:

Emulate Demo client
====================

The client emulation process is the same as the brand emulation, with the
difference that it filters the block ‘Client Configuration’ instead of
‘Brand Configuration’.

Once the client has been emulated, the top right corner of the portal will
show that we are in the right path :)