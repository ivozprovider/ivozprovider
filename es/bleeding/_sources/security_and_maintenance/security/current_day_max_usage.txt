#####################
Current day max usage
#####################

CGRateS calculates price for every external outgoing call placed through non-externally-rated Carrier (see :ref:`Billing`).

Total amount of money spent within a day can be limited using this feature, avoiding call toll fraud (or at least
reducing damages).

Take into account that **depending on BillingMethod current day max usage will be updated during a call or only on call hang up**:

    - **Postpaid**: when a call is hung up, counter is updated. If threshold is exceeded, all calls of that client will be hung up.

    - **Pseudo-prepaid**: equal to postpaid, as credit is not updated during a call.

    - **Prepaid**: credit is updated during a call, so as soon as max daily usage is reached, all calls of the client will be hung up.

.. tip:: Set a reasonable limit for every client so that abnormal money usage is automatically blocked.

More information at :ref:`current day usages`.