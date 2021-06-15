At this point, we are looking forward to make our first outgoing call with our
new IvozProvider, we may have even tried to call with current configuration but...

.. _noplan_nocall:

########################
No pricing plan, no call
########################

Just the way we warned :ref:`when we described the duties of the brand operator
<brand_responsibilities>`, the brand operator is **responsible for making all the
needed setup so that IvozProvider is able to bill all external calls**.

.. note:: **Billing a call** is the action of **assigning price** to a call that implies
   cost.

**IvozProvider checks live that a call can be billed when it is established** to avoid
placing calls that imply cost but won't be billed because Brand Operator, due to
a mistake, hasn't assigned a price.

.. error:: If a call can't be billed, IvozProvider won't allow its establishment.

.. _price_pattern:

**************************
Creating a pricing pattern
**************************

Just the way :ref:`target patterns <target_patterns>` exist, **pricing patterns**
exist and are configured in this section:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_pattern_section.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_pattern_section.png


.. important:: A call is considered billable if there is a pricing pattern that
   matches this call.

Pricing patterns section is empty by default, as opposed to target patterns section,
that has all the 254 countries of the world. The reason is that pricing pattern
will usually imply lots of pattern per country (GSM networks, especial numbers,
mobile numbers, fixed lines, etc.).

We will create the pricing plan 'Spain' for our outgoing call:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_pattern_add.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_pattern_add.png



.. _price_plan:

***********************
Creating a pricing plan
***********************

A **Pricing plan** determines the price of a type of call (of a pricing pattern)
and is configured in this section:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_section.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_section.png


We create a **pricing plan** for our goal:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_add.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_add.png


And we add the **pricing patter** we have just created:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_add_price.png

    .. image:: img/en/pricing_plans_add_price2.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_add_price.png

    .. image:: img/es/pricing_plans_add_price2.png

.. note:: Floating number must use the "." as decimal separator (e.g. 0.02)

.. rubric:: Finding a pricing plan for a specific destination

To check the configuration so far we can **find a pricing plan** for a call
pressing:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_find_plan.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_find_plan.png


We introduce the destination number in :ref:`E.164 format <e164>`:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_find_plan2.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_find_plan2.png


And we can check that it matches the **precing plan** we have just created:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_find_plan3.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_find_plan3.png


.. _pricing_plan_to_company:

*************************************
Assigning a pricing plan to a company
*************************************

A specific **pricing plan** can be linked to 'n' companies and the *brand
operator* is responsible for this task.

In the section **Brand configuration** > **Companies** we select the *demo*
company:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_relate_company.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_relate_company.png


The **Pricing plan** and **Companies** relationship is set for a determined
period of time, that's why we have to select *Start time* and *End time*:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_relate_company2.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_relate_company2.png


The **metric** of the link lets you assign more than one *pricing plan* for a
company, even though some destinations are included in more than one of those
pricing plans.

.. attention:: If a given call can be billed with more than one active pricing
   plan, it will be billed using the pricing plan with lower metric.

.. tip:: This allows having a general *Pricing plan* and concrete the price of
   a specific destination in another *pricing plan* with lower metric (free cell
   phone calls, for example).

.. rubric:: Simulating a call of a specific company

We can simulate a call for a given company and check the price it will imply.
This way, we can be sure that the configuration is ok and that calls to that
destination will be billed using a specific *Pricing plan*:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_simulate_companycall.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_simulate_companycall.png


We introduce the destination number in :ref:`E.164 format <e164>`:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_simulate_companycall2.png
       :align: center

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_simulate_companycall2.png
       :align: center

And we confirm that it will be billed with the pricing plan that we have just
created and linked:

.. ifconfig:: language == 'en'

    .. image:: img/en/pricing_plans_simulate_companycall3.png

.. ifconfig:: language == 'es'

    .. image:: img/es/pricing_plans_simulate_companycall3.png


.. note:: At this point, *Alice* should be able to make outgoing calls to
   spanish destinations and this calls should be billed accordingly.
