import { 
    faBars, faThLarge, faBell, 
    faCalendar, faBullseye, faChartColumn,
    faSquarePlus, faGear, faPlusCircle,
    faSuitcase, faChevronRight, faChevronLeft, faCircle, faCircleCheck,
    faRightLeft, faClock, faMagnifyingGlass,
    faFilter
} from '@fortawesome/free-solid-svg-icons'

export default {

    icons: {
        iconPack: 'fa',
        iconSet: {
            faBars,
            faThLarge,
            faBell,
            faCalendar,
            faBullseye,
            faChartColumn,
            faSquarePlus,
            faGear,
            faPlusCircle,
            faSuitcase,
            faChevronRight,
            faChevronLeft,
            faCircle,
            faCircleCheck,
            faRightLeft,
            faClock,
            faMagnifyingGlass,
            faFilter
        }
    },
    extendTheme: {
        colors: {
            green: {
                500: '#8bc486', // header
                600: '#107154', // green button
                650: '#098161', // green button hover
                800: '#738b75', // top icon
                900: '#3a5138', // header icon and Title
            },
            pink: {
                500: '#d60397'
            }
        }
    }



}