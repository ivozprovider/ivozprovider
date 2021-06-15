SIP Terminal configuration
==========================

The last thing we need is 2 SIP terminals (hardphones, softphones or even
mobile applications) and configure them as follows: 

**ALICE**

- **User**: alice
- **Password**: alice
- **Domain**: users.democlient.com (or the IP if we are using :ref:`the DNS 
  trick <dnshack>`)

**BOB**

- **User**: bob
- **Password**: bob
- **Domain**: users.democlient.com (or the IP if we are using :ref:`the DNS 
  trick <dnshack>`)

.. tip:: Sometimes the user and domain is configured in a single option. In this
   case we should enter alice@users.democlient.com and bob@users.democlient.com
   (or the IP if we are using :ref:`the DNS trick <dnshack>`)
   
After configuring the terminals, Alice should be able to call Bob only by
dialing 102 in her terminal.
