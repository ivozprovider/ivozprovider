.. _external_ddis:

#############
External DDIs
#############

In the previous section :ref:`settingup_ddi` we described in detail the required
configuration for an external DDI routed to user. This section will go a bit
further and explain the rest of configurable options of DDIs.

********************
DDI external filters
********************

We can assign a **external call filter** configured in :ref:`previous section 
<external_filters>`.

.. image:: img/ddi_edit.png

.. _routing_logics:

**********
DDI routes
**********

Once the call has passed all the checks in the filter (schedules and calendars)
and after the welcome locution has been played (if there is any configured),
we can route the call to the following processes:

- :ref:`huntgroups`

.. image:: img/ddi_edit2.png

- :ref:`Generic IVR <generic_ivrs>`

.. image:: img/ddi_edit3.png

- :ref:`Custom IVR <custom_ivrs>`

.. image:: img/ddi_edit4.png

- :ref:`conference_rooms`

.. image:: img/ddi_edit5.png

.. hint:: We can also route the DDI to a :ref:`Virtual Fax <faxing_system>`, but
   this is something we will explain in the following block.
