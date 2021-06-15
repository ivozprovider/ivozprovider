.. _external_calls:

##############
External calls
##############

**External calls** section lists **both inbound and outbound external calls**.

This section is shown at different levels:

- Main level (god level)

- Brand level (filtered for emulated/logged brand).

- Client level (filtered for emulated/logged client).

Each entry shows this information:

.. glossary::

    Start time
        Date and time of the call establishment.

    Brand
        Only visible for *god*, shows the brand of each call.

    Client
        Visible for *god* and *brand operator*, shows the client of each call.

    Caller
        DDI presented for the outgoing call.

    Callee
        External number dialed.

    Duration
        Shows how long the call lasted.

    Price
        The money amount for the client. Visible for *god* and *brand operator* and *Client administrator* if
        *Display billing details to client* is enabled.

    Cost
        Visible for *god* and *brand operator*, the money amount for the brand (the money that the carrier will bill for the call).

    Rating Plan
        Rating plan used to set price for the call. Visible for *god* and *brand operator* and *Client administrator* if
        *Display billing details to client* is enabled.

    Destination
        Destination that matched the call for billing. Visible for *god* and *brand operator* and *Client administrator* if
        *Display billing details to client* is enabled.

    Carrier
        Visible for *god* and *brand operator*, shows which :ref:`Carrier <carriers>` was used for each outbound call.

    DDI Provider
        Visible for *god* and *brand operator*, shows which :ref:`DDI Provider <DDI Providers>` was used for each inbound call.

    Invoice
        Visible for *god* and *brand operator*, shows if a call is already included in any :ref:`Invoice <invoices>`.

    Call ID
        Shows the call ID of the call for troubleshooting and CSV export.

    Endpoint Type
        Possible values: RetailAccount, ResidentialDevice, User, Fax, Friend.

    Endpoint Id
        Internal ID of specific endpoint (only when *endpointType* is non-empty).

    Endpoint Name
        User extension, friend name, fax name, retail account name or residential device name (only when *endpointId* is non-empty).

.. note:: An asynchronous process parses each external call and adds it to this list a few minutes after call hangup. Billing related fields, such as cost and price, will be empty for external incoming calls.

Call rerating
=============

At **brand level**, there is an additional available operation for outbound calls: **Rerate call**. This option allows calling rating engine again for a call or a bunch of calls.

Notes about this rerating process:

- If a call is in an invoice, it cannot be rerated. Invoice must be deleted first.

- Call will be rerated with the *Start time* of the call (no with current active rating plans, but with active rating plans
  on the moment of the call).

- Both *Price* and *Cost* will be recalculated. This may imply updating *rating plan* and *destination* too.

.. tip:: When a call is rerated, cost and price are emptied until the next iteration of the asynchronous task.
