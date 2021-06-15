#######
Billing
#######

Billing a call is the **action of setting a price** to a call that implies cost.

Billing calls depends upon an automatic process:

- When a call is about to be established, IvozProvider verifies that it will be able to bill it.

.. error:: If with the current configuration (active and applicable rating plans for
           a given client and for the specific destination) it won't be possible to
           bill the call, IvozProvider will prevent its establishment.

- Once a call that implies cost is hung up and is parsed by an asynchronous process, it is listed in :ref:`external_calls`.

***************
Billing methods
***************

IvozProvider supports 3 different billing methods. Billing method is configured at client level via *Billing method* parameter.


Postpaid billing
================

   - Call rating is done after the call ends.

   - No configurable limit or balances involved.


Prepaid billing
================

   - Call rating is done during the call.

   - Clients with prepaid billing method have a preconfigured balance that will be decrement during the call.

   - When the balance reaches zero, all established calls for the client will hang up.

   - Clients cannot place new calls with zero or negative balance.

   - Low balance email notifications can be configured.


Pseudo-prepaid billing
======================

   - Call rating is done after the call ends.

   - Clients with pseudo-prepaid billing method have a preconfigured balance that will be decrement after the call ends.

   - Clients cannot place new calls with zero or below balance.

   - Low balance email notifications can be configured.

.. warning:: Call duration is limited to the maximum duration possible with available balance at the moment of call establishment.

**************
Price and cost
**************

- Call **price** is the amount of money the brand operator will charge to its **client** for every call.

- Call **cost** is the amount of money the brand operator will be charged by the **carrier** for every call.

**Call cost calculation is optional**, as no every carrier has *Calculate Cost?* setting enabled. On the other hand, **call
price calculation is mandatory** for every outgoing call.

.. note:: Carrier call cost calculation, if enabled, is always done postpaid. Carriers with negative balance are allowed and
             no call will be hung up when carrier balance reaches 0.

********
Concepts
********

This topic will cover every topic involved in the billing process:

.. toctree::
    :maxdepth: 2
    :titlesonly:

    rating_plans
    destination_rates
    destinations
    prepaid_balances
    current_day_usages
