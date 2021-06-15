Once we have an agreement with a DDI provider and we have configured it in
the previous section, only two task are pending:

.. _settingup_ddi:

###########################
Configuring an external DDI
###########################

The brand operator, responsible of these *peering* agreements with VoIP providers,
has the task to create the DDIs for each client.

Notice that in order to access this section, the brand operator (or *god*)
must have emulated the proper client and access the menu section **Client
Configuration**.

.. attention:: Section **Client configuration > DDIs** is different when the
   client administrator access than the displayed data when a global or brand
   administrator does. Client administrator are unable to create or delete
   DDIs, just edit the one created by the brand or god administrator.

Taking into account these concepts, we create a new DDI and fill the required
fields.

For detailed information about configuration fields, check :ref:`DDIs <pbx_ddis>` section.

.. rubric:: Configure incoming routes

In the previous section, we have created the DDI and configure it (pointing it to user Alice),
but **the most common procedure** is that the brand operator just creates the DDI while the
**client administrator**, using the same section, **configures** it choosing
the correct route (user, hunt group, etc.), calendars filters and so on.

.. note:: At this point, calling the number of the configured DDI will make the
   *Alice* phone ring.
