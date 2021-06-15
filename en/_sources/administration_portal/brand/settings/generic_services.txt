.. _brand_services:

################
Generic Services
################

This section allows the brand operator to change the default services and default service codes for new clients.

By default this list has all the services and codes from the god level **Service** section.

.. warning:: Changing/deleting the default code in this section will only affect new created clients. Existing clients codes won't
          be modified.

Call forward services
=====================

Call forward services (unconditional, no answer, busy and unreachable) are **only available for residential clients**
and allow adding **call forward to national phone numbers**.

All residential **clients within a brand use the same codes** to access to this feature, those defined in this section.

.. note:: Call forward to voicemail or to numbers outside company's country is not supported using services codes.
             Use web portal instead.

.. rubric:: Enabling a call forward setting

To enable a call forward of a given type to forward calls to a national number, residential device must call to defined
service code followed by destination number. This will create and enable (or modify if already exists one) a call
forward of given type to that national number.

.. rubric:: Disabling a call forward setting

Calling to the code without any additional number will delete all active call forward settings of that type.