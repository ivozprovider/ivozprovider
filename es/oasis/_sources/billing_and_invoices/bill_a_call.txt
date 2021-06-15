############
Call billing
############

Billing a call is the **action of setting a price** to a call that implies cost.

*****************
Automatic billing
*****************

As exposed previously, billing calls depends upon an automatic process:

- When a call is about to be established, IvozProvider verifies that it will be
  able to bill it.

    - If with the current configuration (active and applicable pricing plans for
      a given company and for the specific destination) it won't be possible to
      bill the call, IvozProvider will prevent its establishment.

- Once a call that implies cost is hung up, it is listed in :ref:`billable_calls`.

- Some minutes later, the billing task will evaluate each unbilled call and will
  update this fields:

    - Price
    - Pricing plan
    - Pricing pattern
    - Set Metered to 'yes'

*****************
Manual re-billing
*****************

It may happen that the brand operator needs to re-bill an specific call due to
multiple reasons:

- Mistake on imported pricing plan/pattern.

- Multiple pricing plans with incorrect metric value.

- Not asociated pricing plan.

- Etc.

In these cases, the *brand operator* can re-bill wrongly billed calls.

.. important:: Billing a call again means setting the price as it is made right
   now. It uses, therefore, the current configuration of pricing plans
   not the configuration of the moment the call was made.

In order to re-bill some calls (or just one), select them in **Brand configuration**
> **Billable calls** and press the button **Bill calls**.

.. image:: img/retarificate.png

.. error:: **It is not possible to re-bill a call that is currently included in
   an existing invoice**. In other words, if a selected call has a non-empty
   **Invoice** field, this invoice must be deleted before. The reason behind this
   logic is that we don't want and invoice containing calls with a wrong price.
