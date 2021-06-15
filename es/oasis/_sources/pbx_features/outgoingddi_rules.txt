.. _outgoingddi_rules:

##################
Outgoing DDI Rules
##################

Most calling entities in IvozProvider require an outgoing DDI when placing calls
to external numbers. This includes: Users, Friends, Faxes, Retail Accounts, and
so on..

But there are some cases when a single outgoing DDI is not enough, and the
presented DDI depends on the called number. To archive this dynamic outgoing DDI
selection you can use Outgoing DDI rules.

Before creating a new rule, it would be required to frist group the destination
numbers in :ref:`match_lists`.

For this example, we will create a match list of corporative mobiles with all
the mobile numbers of our company workers. When we call to those numbers, we
will keep the original outgoing DDI assigned to the user, and for the rest of
the cases we will force the DDI to the main company outgoing DDI.

.. rubric:: Create a new Outgoing DDI Rule

The main creation screen defines the action that will take place when no rule
matches the dialed destination, so we define to force the main company DDI here.

.. ifconfig:: language == 'en'

    .. image:: img/en/outgoingddi_rules_edit.png
      :align: center

.. ifconfig:: language == 'es'

    .. image:: img/es/outgoingddi_rules_edit.png
      :align: center


.. rubric:: Assign rule lists actions

Now we add a new rule that will match our mobiles to make the user's outgoing
DDI be kept uptouched.

.. ifconfig:: language == 'en'

    .. image:: img/en/outgoingddi_rulepatterns_edit.png
      :align: center

.. ifconfig:: language == 'es'

    .. image:: img/es/outgoingddi_rulepatterns_edit.png
      :align: center


.. rubric:: Assign rule to callers

At last, we have to configure who will use this rule to dynamically change it's
presentation number. We can do this in the **Company's edit screen** or the
**Users's edit screen**.

.. ifconfig:: language == 'en'

    .. image:: img/en/user_outgoingddirule.png
      :align: center

.. ifconfig:: language == 'es'

    .. image:: img/es/user_outgoingddirule.png
      :align: center

In this case, the User will present 777777777 DDI when calling Coporative mobiles
and 666666666 when calling the rest of the external numbers.

.. attention:: Current implementation of Outgoing DDI rules won't work for
    diverted calls (out of schedule, holidays or user's call forward settings).