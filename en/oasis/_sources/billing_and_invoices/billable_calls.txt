.. _billable_calls:

##############
Billable calls
##############

**Billable calls** sections only list **calls that imply cost**.

.. important:: :ref:`call_registry` sections, on the other hand, show all calls,
   even the ones that do not imply cost, such as internal calls, incoming calls,
   etc.

These lists therefore include the price of each call (once it is calculated). Since
companies are notified about its call's price via invoices issued by **brand operator**,
this section is only available at two levels:

- Main level (god level)

- Brand level

Each entry shows this information:

.. glossary::

    Date
        Date and time of the call establishment.

    Brand
        Only visible for *god*, shows the brand of each call.

    Company
        Visible for *god* and *brand operator*, show the company of each call.

    Destination
        External number dialed.

    Pricing pattern
        Shows the :ref:`pricing pattern <price_pattern>` used to set the price.

    Duration
        Shows how long the call lasted.

    Metered (yes/no)
        Shows if the asynchronous task that sets the price of each call has
        parsed each call.

    Price
        The cost of the call.

    Pricing plan
        Shows the :ref:`Pricing plan <price_plan>` used to set the price.

    Peering contract
        Shows which :ref:`Peering contract <peering_contracts>` was used for
        each call.

    Invoice
        Show if a call is already included in any :ref:`invoice <invoices>`.

    Type (inbound/outbound)
        Since some incoming calls can imply cost (see
        :ref:`billing of inbound calls <bill_inbound>`), show if the call is an
        incoming call or an outgoung one.

.. note:: As soon as the call is hung up, they appear in this list. In some minutes
   time the asynchronous process will set *Metered* to 'yes' and will assign a
   **price**.
