The final user has two different kinds of credentials, both supplied by
its company administator:

- User portal access credetentials

- SIP credentials used to register its terminal (or terminals) to IvozProvider

Through the user portal, it can browse their call registry and configure:

    - Call forward
    - Do not disturb
    - Call waiting

On the other hand, the SIP creadentials allow the users to configure
their terminal (or terminals) to place and receive calls.

.. note:: The same SIP credentials can be used in multiple devices at the same
   time,generating what is known as *parallel-forking*: whenever a call is
   placed to an user, all the active devices will ring so the user can
   answer the call from any of them.

.. important:: Final users are the ones that use and enjoy all the feature of
   IvozProvider

