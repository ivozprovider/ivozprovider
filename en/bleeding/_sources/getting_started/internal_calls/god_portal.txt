********************
Global Configuration
********************

.. important:: Any of the 2 Public IP addresses configured during the
    installation will work to access the web portal. Default credentials are
    **admin / changeme**.

In this section will reference global administrator configuration options,
available in the menu (**Main management**) of the web portal (only visible to
God Admins):

Emulate the Demo brand
======================

As mentioned above, the initial installation will have an already created brand
called DemoBrand, that will be used for our goal: to have 2 telephones registered
that can call each other.

Before going to the next section, is quite important to understand how the
**emulation** works.

- As global operator, you have access to the menu **Global Configuration** only
  visible to *God* administrators.

- Apart from that menu, you will also have access to the **Brand Configuration**
  and **Client configuration** blocks.

- Last two blocks have a red button in the right side.

- When pressed, a popup will be displayed that lists all existing brands / clients.

- After selecting the DemoBrand brand, the icon will change.

- The upper right corner of the portal will also display the brand that is being
  emulated.

What emulation means
====================

Basically, that **everything in the menu 'Brand configuration' will be relative
to the chosen brand** and is **exactly** the same menu entries that the brand
operator will see using its brand portal.

.. tip:: Ok, ok, maybe exactly is not totally accurate. The global operator is
    able to see some fields in some screens that other admins can't (i.e. On
    Client edit screen, fields like 'Media relays' or 'Application server' are
    only configurable by the global operator.
