Global Special Numbers
======================

This section allows adding external numbers that will be handled in a different way by IvozProvider when a client
calls to those destinations (**only for external outgoing calls**).

.. note:: Numbers listed here will apply in every brand. Brand operator may add numbers too using :ref:`Special Numbers`.

Disable CDR
-----------

Currently there is only one special treatment: **Disable CDR**. Setting this to *Yes* for a number will:

- Prevent outgoing external calls from being listed in following sections:

  - *Active Calls*

  - *External Calls*

  - *Call Registry* (both client portal and user portal)

- As a consequence, calls won't be included in any:

  - :ref:`Invoices`

  - CSV defined by :ref:`Call CSV schedulers`

  - API response of related endpoints

- Do not call CGRateS for these calls: call will be allowed no matter if active pricing plan allows it.

    - As a consequence, no price/cost will be decreased from carrier/client account.

- Prevent recording these calls. As a consequence, *Recordings* section won't list them.

.. warning:: Adding a number will cause this special handling **only for future outgoing external calls**.
             No change is made in previous calls.