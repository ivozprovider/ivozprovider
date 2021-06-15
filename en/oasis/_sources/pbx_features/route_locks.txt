.. _route_locks:

###########
Route locks
###########

Route locks are a simple but powerful way to fork route logics when delivering calls. This fork is done depending on the
state of the lock on a particular moment:

- **Opened**: green light, go ahead.
- **Closed**: red light, no trespassing allowed.

They are used as conditional route rule criteria (see how in :ref:`conditional_routes`).

Route lock creation
===================

When you add a new route lock in **Route Locks** section, you are asked for the following fields:

.. glossary::

    Name
        This name will be used in conditional routes to identify the lock.

    Description
        Just a description.

    Status
        Set the initial status of the lock: opened or closed.

Route locks service codes
=========================

Although you can set the initial lock status on creation and change it using the admin portal too, the usual way to
handle the status changes of a lock is to use the service codes listed in **Route locks** section.

These services codes have two parts:

- **Service code**: configured in **Services** section per brand/company.

- **Lock id**: immutable numeric id assigned to each lock.

.. tip:: There are 3 service codes available for most common operations on locks:

    - Open Lock

    - Close Lock

    - Toggle Lock.

    Read :ref:`services` for further details.

