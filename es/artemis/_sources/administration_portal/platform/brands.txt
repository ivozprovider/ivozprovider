######
Brands
######

*God operator* is responsible for creating and managing platform brands through this section.

This are the fields shown when a new brand is created:

.. glossary::

    Name
        Sets the name for this brand.

    TIN
        Number used in this brand's invoices.

    Logo
        Used as default logo in invoices and in portals (if they don't specify
        another logo).

    Invoice data
        Data included in invoices created by this brand.

    SIP domain
        Introduced in 1.4. Domain pointing to Users SIP proxy used by all the
        Retail Accounts and Residential Devices of this brand.

    Recordings
        Configures a limit for the size of recordings of this brand. A
        notification is sent to configured address when 80% is reached and
        older recordings are rotated when configured size is reached.

    Features
        Introduced in 1.3, lets god operator choose the features of the created
        brand. An equivalent configuration is available in Clients, to choose
        between the ones that god operator gave to your Brand. Related sections
        are hidden consequently.

    Max calls
        Limits both user generated and **external** received calls to this value
        (0 for unlimited).

    Locales
        Define default Timezone, Language and Currency for clients of this brand.

    Notifications
        Configure the email :ref:`notification templates` to use for this brand.
        Clients configured to use generic notifications will use configured
        brand notifications. If brand has no notification configured
        :ref:`default notification templates` will be used.

    ProxyTrunks
        Select which ProxyTrunks addresses can be used by this brand. Read :ref:`Proxy Trunks`
        for further details. It is not possible to unassign an address used in any :ref:`carrier <Carriers>` or
        :ref:`DDI provider <DDI Providers>`.

.. hint:: Some features are related to brand and cannot be assigned to clients.
    Other ones are also related to clients and lets the brand operator to
    assign them to its clients.

.. warning:: Disabling billing hides all related sections and assumes that an
    external element will set a price for calls (external tarification
    module is needed, ask for it!).

.. note:: Disabling invoices hides related sections, assuming you will use an
    external tool to generate them.

.. note:: SIP domain is only visible for Brands with Retail or Residential features
    enabled.

Brand operators
---------------

**List of brand operators** subsection allows adding/editing/deleting credentials for brand portal access.

Read :ref:`acls` for further explanation about restricted brand administrators.


Brand Portals
-------------

**List of brand portals** subsection allows managing URLs to access to the different web portals available for a given brand.

See :ref:`Client Portals` for further reference.

.. warning:: URLs are assigned to brands. This means that through a given URL the brand can be guessed, but not the client.
             As a result, username collision domain will be at brand level (there cannot exist to client administrators
             with the same username within a brand).
