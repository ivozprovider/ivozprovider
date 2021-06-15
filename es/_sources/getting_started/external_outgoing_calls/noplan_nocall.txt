At this point, we are looking forward to make our first outgoing call with our
new IvozProvider, we may have even tried to call with current configuration but...

.. _noplan_nocall:

#######################
No rating plan, no call
#######################

Just the way we warned :ref:`when we described the duties of the brand operator
<brand_responsibilities>`, the brand operator is **responsible for making all the
needed setup so that IvozProvider is able to bill all external calls**.

.. note:: **Billing a call** is the action of **assigning price** to a call that implies
   cost.

**IvozProvider checks live that a call can be billed when it is established** to avoid
placing calls that imply cost but won't be billed because Brand Operator, due to
a mistake, hasn't assigned a price.

.. error:: If a call can't be billed, IvozProvider won't allow its establishment.

**********************
Creating a rating plan
**********************

**Brand Configuration > Billing > Destination** section is empty by default, as opposed to routing patterns section,
that has all the 254 countries of the world. The reason is that one destination rate
will usually imply lots of pattern per country (GSM networks, especial numbers,
mobile numbers, fixed lines, etc.).

In most of the cases, this section data will be imported from CSV provided by your
VoIP provider, but for our test we will create it manually:

- Create a **destination** with '+34' for Spain.

- Create a **destination rate** and insert a price for Spain destination.

- Create a **rating plan** that includes that destination rate.

****************************
Assign rating plan to client
****************************

The last step is **assigning that rating plan** to *democompany* following the indication
:ref:`here <Assigning rating plans to clients>`.