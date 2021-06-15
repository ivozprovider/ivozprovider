#############
Rating plans
#############

Rating plans describe how calls are rated for different destinations at different times of the day.

**********************
Rating plan definition
**********************

:ref:`Destination rates` are grouped using Rating plans. This offers the possibility to have base pricing data and customize
some destinations with different prices at different times of the day.

This are the fields that define a Rating plan:

.. glossary::

    Name
        Name that will be use to reference this rating plan.

    Description
        A field to enter additional information. Not used anywhere.

    Currency
        All destination rates grouped must use this currency.

.. tip:: Rating plan names appear on final clients' invoices, choose something with commercial sense.

***************************************
Adding Destination rates to Rating Plan
***************************************

Rating plans group several :ref:`destination rates` to allow flexible configuration that rate destinations differently
at different times of the day (**List of destination rates** subsection).

.. glossary::

    Destination rate
        Adds selected destination rate to rating plan

    Weight
        If a given call can be billed with more than one destination rate within the rating plan,
        it will be billed using the one with highest weight.

    Timing type
        Should this association apply always or just at given times of the week?

.. tip:: Weight allows having a general *Destination rate* and concrete the price of
         a specific destination in another *destination rate* with higher weight (free cell
         phone calls, for example).

.. warning:: A rating plan MUST be capable of rating calls 24x7. Adding the timings of all destination rates in a rating
           plan MUST cover every moment of the week.

.. rubric:: Checking Rating plans

To check the configuration so far we can **Simulate a call** from the rating plans list.

We introduce the destination number in :ref:`E.164 format <e164>`, and we can check the price every rating plan on the
list will charge for that call.

.. tip:: Rating plans can be linked to both Clients (for price calculation) and Carriers (for cost calculation).

*********************************
Assigning rating plans to clients
*********************************

An specific **rating plan** can be linked to multiple clients.

In the section **Brand configuration** > **Virtual PBXs** (**Residential**, **Retail** and **Wholesale**) we select
**List of Rating Plans** subsection.

.. note:: Every **Rating plan** has an activation time and only one can be active for each
          client at a specific moment (the one whose activation time is nearer in the past).

.. rubric:: Simulating a call of a specific client

In this list we can also simulate a call for a given client like we did previously
in the rating plan list and check the price it will imply. This way, we can be sure
that the configuration is ok.

.. tip:: Active rating plan of a given client will be used to set Price for its calls.

**********************************
Assigning rating plans to carriers
**********************************

An specific **rating plan** can be linked to multiple carriers to calculate cost of calls (see :ref:`Cost calculation`).

In the section **Brand configuration** > **Providers** > **Carriers** we select **List of Rating Plans** subsection.

.. note:: Every **Rating plan** has an activation time and only one can be active for each
          client at a specific moment (the one whose activation time is nearer in the past).

.. rubric:: Simulating a call of a specific carrier

In this list we can also simulate a call for a given carrier like we did previously
in the rating plan list and check the price it will imply. This way, we can be sure
that the configuration is ok.

.. tip:: Active rating plan of a given carrier will be used to set Cost for calls established using it.
