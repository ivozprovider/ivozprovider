.. _faxing_system:

#####
Faxes
#####

IvozProvider includes a simple but efficient *virtual faxing* solution that allows:

- Sending PDF files via Fax.

- Receiving faxes through email or check them through the web portal.

.. error:: IvozProvider uses
   `T.38 <http://www.voip-info.org/wiki/view/T.38>`_ for both sending and receiving
   faxes. Brand Operator must use *peering contracts* that have support for it.

**********************
Creating a virtual fax
**********************

These are the fields that turn up when we create a new fax:

.. glossary::

    Name
        Used by remaining section to reference a fax

    Email
        Email address when we want to receive incoming faxes (if we check 'Send
        by email')

    Outbound DDI
        DDI used as source number for outgoing faxes

To receive faxes in this DDI, we need to point it to our new fax in the section
**DDIs**.

Brand Operator can choose one or more :ref:`Outgoing Routings` for sending faxes.

.. note:: *load-balancing* y *failover* logics described in :ref:`Outgoing Routings`
   apply to faxes too.

.. important:: If no fax-specific route is defined, faxes will be routed using
   standard call routes.

*************
Sending a fax
*************

Sending a fax is an easy task that is done through **List of outgoing faxfiles** subsection.

First, we upload de PDF file and set the destination. When we save the entry, the list shows the fax and its status.

**********************
Incoming faxes display
**********************

Apart from being received by mail, faxes can be watched and downloaded within
the web portal too in **List of incoming faxfiles** subsection.

