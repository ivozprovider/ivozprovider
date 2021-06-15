.. _external_ddi:

##########################
Outgoing DDI configuration
##########################

Before placing our first outgoing call, it would be desirable to choose the
number that the callee will see when the phone rings, so that he can return the
call easily.

To achieve this goal, we have to configure our DDI as *Alice's* **outbound DDI**,
because she will be the chosen one to place our first outgoing call:

.. ifconfig:: language == 'en'

    .. image:: img/en/ddi_out.png

.. ifconfig:: language == 'es'

    .. image:: img/es/ddi_out.png

We can set this up editing *Alice* in **Company Configuration** > **Users**. If
this change is made by brand operator or global operator, he must :ref:`emulate
the corresponding company <emulate_company>` previously.

.. warning:: Calls from users without an outgoing DDI will be rejected by IvozProvider.
