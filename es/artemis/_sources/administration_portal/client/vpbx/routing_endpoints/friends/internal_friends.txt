Internal friends
================

Internal friends allows a vPBX client to call to **Extensions** of another vPBX client in the same brand.

.. important:: Only extensions in :ref:`Extensions <extensions>` section.

If calling to an extension in another vPBX causes an external call, it is allowed:

- Calling to a user with an external call forwarding settings.

- Calling to an extension routed to an external number.

- Calling to an extension routed to a IVR with an option pointing an external number.

- Etc.

What kind of calls can be routed through an *internal friend*?
--------------------------------------------------------------

IvozProvider will route any call matching an Extension in vpbx client connected by the internal friend.

Configuration of internal friends
---------------------------------

These are the configurable settings of *internal friends*:

.. glossary::

    Description
        Optional. Extra information for this **friend**.

    Priority
        Used to solve conflicts while routing calls through **friends**.
        If a call destination **matches** more than one friend regular expression
        the call will be routed through the friend with **less priority value**.

    Connectivity mode
        Choose "IntervPBX" for internal friends.

    Target Client
        vPBX client inside the same brand you want to connect.

    Fallback Outgoing DDI
        If called extension causes an external call, this DDI will be used as source number.

    Always apply transformations
        Numbers listed in Extensions section of both source and destination client will be considered as internal and
        won't traverse numeric transformation rules. Enable this setting to force Numeric Transformation rules even on these numbers. 

.. note:: Calls to *friends* are considered internal. That means that ACLs won't
          be checked when calling a friend, no matter if the origin of the call
          is a user or another friend.

Summary of internal friends
---------------------------

These are key points to understand *internal friends*:

- They have been designed to allow users from a vPBX to call to extensions (normally users)
  of another vPBX of the same brand.

- Usually they will allow user-user calls.

- You cannot use an internal friend to generate external calls paid by the other client.

- But external calls may happen if extensions are pointed to external numbers (controlled external calls).
