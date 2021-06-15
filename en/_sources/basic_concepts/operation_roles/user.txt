The final user has two different kinds of credentials, both supplied by
its client administrator:

- User portal access credentials

- SIP credentials used to register terminals to IvozProvider

Through the user portal, it can browse their call registry and configure:

   - Call forward
   - Do not disturb
   - Call waiting
   - Displayed data when calling
   - Geographical configuration

On the other hand, the SIP credentials allow users to configure their terminals to place and receive calls.

.. note:: The same SIP credentials can be used in multiple devices at the same
   time,generating what is known as *parallel-forking*: whenever a call is
   placed to an user, all the active devices will ring so the user can
   answer the call from any of them.


