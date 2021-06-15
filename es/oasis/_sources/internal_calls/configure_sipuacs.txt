SIP Terminal configuration
==========================

The last thing we need is 2 SIP terminals (hardphones, softphones or even
mobile applications) and configure them as follows: 

**ALICE**

- **User**: alice
- **Password**: alice
- **Domain**: users.democompany.com (or the IP if we are using :ref:`the DNS 
  trick <dnshack>`)

**BOB**

- **User**: bob
- **Password**: bob
- **Domain**: users.democompany.com (or the IP if we are using :ref:`the DNS 
  trick <dnshack>`)

.. tip:: Sometimes the user and domain is configured in a single option. In this
   case we should enter alice@users.democompany.com and bob@users.democompany.com
   (or the IP if we are using :ref:`the DNS trick <dnshack>`)
   
After configuring the terminals, Alices should be able to call Bob only by
dialing 102 in her terminal.
