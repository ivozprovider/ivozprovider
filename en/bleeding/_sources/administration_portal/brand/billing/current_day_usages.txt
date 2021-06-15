******************
Current day usages
******************

This section lists current day usage for each client in the brand:

.. glossary::

    Type
        Type of client (vPBX, retail, residential or wholesale).

    Name
        Client name.

    Today usage
        Amount of spent money in today's external calls.

    Max daily usage
        When this threshold is reached, account is disabled. At midnight, it will be re-enabled.

    Status
        Whether account has been disabled or not.


.. note:: Client max daily usage is configured in **Clients configuration** with **Max daily usage** parameter.

.. tip:: If an account is disabled, increasing its counter above current day usages re-enables it. Otherwise, it will be
         re-enabled at midnight.


.. error:: This is one of main :ref:`security` mechanisms available in IvozProvider. Use it to avoid toll fraud calls
           (see :ref:`Current day max usage`).

This section shows runtime value obtained asking to CGRateS (value actually applying) that should be equal to the one
set editing the client itself. If data is shown in red, these values differ.
