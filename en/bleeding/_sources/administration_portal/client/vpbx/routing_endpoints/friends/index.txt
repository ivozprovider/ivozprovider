*******
Friends
*******

**Friends** section in the **Client configuration** allows interconnection of
IvozProvider with other SIP PBX systems through a SIP *trunk*. The most typical
use case is when a client have multiple PBX systems that want to integrate in
a single flow.

Since 2.10, **Friends** also lets a vPBX client to call to extensions of another
vPBX client in the same brand.

.. warning:: It's important to understand the difference between **Carrier**
             defined by the **brand operator** to connect with the public network
             and **Friends**, defined by **client administrators** to connect the
             system with other PBXs.

.. hint:: **Friends** are so similar to **Users** that both talk SIP with the
          :ref:`proxyusers`.

Types of friends
================

There are 2 main types of Friends:

- **Remote friends**: SIP trunks to external SIP PBX system.

- **Internal friends**: connection between extensions of two vPBX client in the same brand.


What kind of calls can be routed through an *internal friend*?
--------------------------------------------------------------

IvozProvider will route a call received by a :ref:`user <users>` or a :ref:`friend <friends>` following this logic:

#. Destination matches an existing IvozProvider extension?
#. If not: Destination matches any *friend* regular expression (for remote friends) or extensions (for internal ones)? Ordered by priority (lower has precedence).
#. If not: This is an external call.



Following sections explain both kind of friends:

.. toctree::
    :maxdepth: 1
    :titlesonly:

    remote_friends
    internal_friends
