.. _call_permissions:

#########
Call ACLs
#########

The **Call ACLs** determines what users can call to external numbers. 

.. attention:: The internal extensions (the ones listed in :ref:`Extensions`) are allowed to all users, the **Call
   ACLs only apply to external numbers**. Calls to friends extensions are considered internal too, no call ACL is needed.

The **Call ACL** setup has two different parts: 

- Classify the call in different types based on **match lists**:

    - Brand level: **Brand Configuration** > **Generic Match Lists**

    - Client level: **Client Configuration** > **Match Lists**

- Choose policies for groups of patterns: **Client Configuration** > **Call 
  ACLs**

*******************
Call ACL Matchlists
*******************

The destination number is matched against the **ACL MatchLists** to determine
the call permission.

.. note:: Brand matchlists can be used by any of its clients, so most common
   ACL Patterns (p.e. country prefixes) can be reused easily.

For more information of how MatchLists patterns are created, please refer to section
:ref:`match_lists`.

.. error:: **Regular expressions** of Match List patterns must be **in E.164** format and **plus symbol must be
               escaped** (e.g. ^\\+34 for all spanish numbers).


********
Call ACL
********

When a new **Call ACL** is created, these two fields turn up:

.. glossary::

   Name
      Used to reference this Call ACL.

   Default policy
      If no rule matches, this ACL will deny the call or allow it?

After creating the **Call ACL** we can edit it to add the required rules:

- Rules to deny some specific destinations.

- Rules to allow some specific destinations.

.. note:: The **metric** determines the evaluation order of the rules.

Assign Call ACLs
================

Created *Call ACLs* can be assigned to:

- Friends through *Call ACL* parameter.

- Users through *Call ACL* parameter.