.. _outgoingddi_rules:

##################
Outgoing DDI Rules
##################

Most calling entities in IvozProvider require an outgoing DDI when placing calls
to external numbers. This includes: Users, Friends, Faxes, Retail Accounts, and
so on..

But there are some cases when a single outgoing DDI is not enough, and the
presented DDI depends on the called number or a given prefix. To archive this
dynamic outgoing DDI selection you can use Outgoing DDI rules.


Outgoing DDI based on destination
---------------------------------

For destination based rules, you would require first group the destination
numbers in :ref:`match_lists`.

For this example, we will create a match list of corporate mobiles with all
the mobile numbers of our client workers. When we call to those numbers, we
will keep the original outgoing DDI assigned to the user, and for the rest of
the cases we will force the DDI to the main client outgoing DDI.

.. rubric:: Create a new Outgoing DDI Rule

The main creation screen defines the action that will take place when no rule
matches the dialed destination, so we define to force the main client DDI here.

.. rubric:: Assign rule lists actions

Now we add a new rule that will match our mobiles to make the user's outgoing
DDI be kept untouched.

.. rubric:: Assign rule to callers

At last, we have to configure who will use this rule to dynamically change it's
presentation number. We can do this in the **Client's edit screen** or the
**Users's edit screen**.

In this case, the User will present 777777777 DDI when calling corporate mobiles
and 666666666 when calling the rest of the external numbers.

Outgoing DDI based on prefix
----------------------------

Outgoing DDI Rules can be also used to change the default Outgoing DDI based on
a call prefix.

.. rubric:: Create a new Outgoing DDI Rule

The main creation screen defines the action that will take place when no rule
matches the dialed destination, we will keep original DDI if no prefix is used.

.. rubric:: Assign a prefix pattern

Now we add a new rule that with prefix (let's say 111) and action to force
the DDI to 666666666.

In this case, the User will present 666666666 DDI when calling any destination
with 111 prefix and 777777777 when not using any prefix.

.. important:: Prefix **must** have this format: from 1 to 3 digits ended by * symbol.