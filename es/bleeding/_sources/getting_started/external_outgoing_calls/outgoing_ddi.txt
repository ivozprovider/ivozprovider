.. _external_ddi:

##########################
Outgoing DDI configuration
##########################

Before placing our first outgoing call, it would be desirable to choose the
number that the callee will see when the phone rings, so that he can return the
call easily.

To achieve this goal, we have to configure our DDI as *Alice's* **outbound DDI**,
because she will be the chosen one to place our first outgoing call.

We can set this up editing *Alice* in **Client Configuration** > **Users**. If
this change is made by brand operator or global operator, he must :ref:`emulate
the corresponding client <emulate_client>` previously.

.. tip:: We could have set the same DDI as Default Outgoing DDI at client level, editing *democompany* client.

.. error:: Calls from users without an outgoing DDI will be rejected by IvozProvider.
