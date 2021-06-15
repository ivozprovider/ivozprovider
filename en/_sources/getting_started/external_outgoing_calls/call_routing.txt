
##############################
Outgoing Routing configuration
##############################

We already have our test call categorized as a call within the **Routing pattern**
'Spain'. In addition, we also have a **Routing pattern group** including 'Spain',
called 'Europe'.

Now we have to tell IvozProvider that calls to 'Spain' or 'Europe' should be
established through our new **Carrier**.

To make this assignment, we use the section **Brand Configuration > Routing > Outgoing routings**:

- Client: "Apply to all clients" (or just *democompany*).

- Type: pattern.

- Destination pattern: Spain.

- Route type: static.

- Carriers: our new carrier.

- Priority: 1

- Priority: 1

For more information about routing and load balancing check :ref:`Outgoing Routings` section.